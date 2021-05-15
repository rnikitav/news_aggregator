<?php


namespace App\Services;


use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Carbon\Carbon;
use DateTime;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Str;

class XMLParserService
{
    protected $categoryName = '';
    protected $category;

    public function parseAndCreateNews(string $link)
    {
        $xml = XmlParser::load($link);
        if (!isset($xml) && !($xml instanceof XmlParser)) {
            return redirect()->route('parser.create')->with('fail', 'Во время загрузки произошла ошибка');
        }
        if ($this->CheckForCurrencyUrl($link)){
            return $xml->parse([
                'title' => ['uses' => '::name'],
                'DateValuteCurs' => ['uses' => '::Date'],
                'currencies' => ['uses' => 'Valute[::ID,NumCode,CharCode,Nominal,Name,Value]'],
            ]);
        }
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'description' => ['uses' => 'channel.description'],
            'link' => ['uses' => 'channel.link'],
            'news' => ['uses' => 'channel.item[guid,title,link,description,pubDate,author,category,enclosure::url]'],
        ]);
        $sourceName = $this->getSourceName($data['title']);
        $source = Source::firstOrCreate(
            ['name' => $sourceName]
        );
        foreach ($data['news'] as $key => $one){
            $pubDateToInsertBd = Carbon::instance(new DateTime($one['pubDate']))->toDateTimeString();
            if ($one['category'] && $this->categoryName != $one['category'] ){
                $this->categoryName = $one['category'];
                $this->category = $this->findOrCreateCategory($this->categoryName);
            }
            if (!$one['category'] && $key === 0){
                preg_match('/(.+[:-] )(.+)$/', $data['title'], $matches);
                $this->categoryName = $matches[2];
                $this->category = $this->findOrCreateCategory($this->categoryName);
            }
            $title = $one['title'];
            News::firstOrCreate(
                    ['pubDate' => $pubDateToInsertBd],
                    [
                        'idCategory'    => $this->category->id,
                        'source_id'     => $source->id,
                        'slug'          => Str::slug($title),
                        'title'         => $title,
                        'desc'          => $title,
                        'body'          => $one['description'],
                        'img'           => $one['enclosure::url'],
                        'pubDate'       => $pubDateToInsertBd,

                    ]
            );
        }
        return view('home.index');
    }

    protected function CheckForCurrencyUrl($url)
    {
        return preg_match('/cbr-xml-daily.ru/m', $url);
    }
    protected function getSourceName(string $title)
    {
        if (preg_match('/[a-zа-яА-Я]+\.[a-zа-яА-я]+/ui',$title, $matches)){
            return $matches[0];
        }
        return Source::inRandomOrder()->first()->name;
    }
    protected function findOrCreateCategory(string $name)
    {
        return Category::firstOrCreate(
            ['name' => $name],
            [
                'name' => $name,
                'slug' => Str::slug($name),
            ]
        );
    }
}
