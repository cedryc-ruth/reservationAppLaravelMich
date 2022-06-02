<?php

namespace App\Models;

use App\Models\Show;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsItem extends Show implements Feedable
{
    use HasFactory;

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create([
            'id' => $this->slug,
            'title' => $this->title,
            'summary' => $this->summary,
            'updated' => $this->updated_at,
            'link' => route('show.show', $this->slug),
            'bookable' => $this->bookable,
            'price' => $this->price,
            'authorName' => 'Karma-reservation',
            'location' => $this->location->designation
        ]);
    }

    public static function getFeedItems()
    {
        return NewsItem::orderBy('updated_at','desc')->get();
    }
    
}
