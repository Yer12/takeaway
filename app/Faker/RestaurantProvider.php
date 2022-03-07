<?php

namespace App\Faker;

use Faker\Provider\Base;

class RestaurantProvider extends Base
{
    protected static array $restaurants = [
        'https://shopandmall.ru/images/news/KFC.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/0b/42/22/21/kfc-restaurant-tables.jpg',
        'https://www.wattagnet.com/ext/resources/Images-by-month-year/20_03/KFC-restaurant-in-food-court1.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/07/de/62/c7/right-side-of-the-food.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/09/ab/0b/0f/kfc.jpg',
        'https://restolife.kz/upload/information_system_6/1/1/6/item_11620/information_items_property_15944.jpg',
        'https://restolife.kz/upload/information_system_6/1/1/6/item_11620/information_items_property_15945.jpg',
        'https://koktobe.com/storage/pages/September2021/9wHetryWsqIxwY7Wbb4l.jpg',
        'https://realkz.com/images_resize/gallery/60943.jpg',
        'https://realkz.com/images_resize/main/60947.jpg',
        'https://realkz.com/images_resize/gallery/60948.jpg',
        'https://realkz.com/images_resize/gallery/9047.jpg',
        'https://gcdn.tomesto.ru/img/place/000/018/765/restoran-sandyk-v-partiynom-pereulke_e8a98_full-24429.jpg',
        'https://gcdn.tomesto.ru/img/place/000/015/856/restoran-sandyk-na-schelkovskom-shosse_10b9d_logo-24580.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/1c/a9/c0/57/photo1jpg.jpg',
        'https://restolife.kz/upload/information_system_6/5/0/8/item_5080/information_items_property_17200.jpg',
        'https://restolife.kz/upload/information_system_6/5/0/8/item_5080/information_items_property_17202.jpg',
        'https://restolife.kz/upload/information_system_6/1/4/7/item_14729/information_items_property_16245.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/03/93/24/bd/la-papa.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/0c/b4/fb/58/del-papa.jpg',
        'https://lsm.kz/static/images/fc79eeb2-makdonalds03.jpg',
        'https://realkz.com/images_resize/main/64003.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/04/af/b5/86/caption.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/08/f7/3f/e7/mcdonald-s-canal-street.jpg',
        'https://image.shutterstock.com/image-photo/pattaya-thailand-february-25-2016-260nw-383462284.jpg',
        'https://forbes.kz/img/articles/834d7ae4b612faacef6aac637d4d66bf-small.jpg',
        'https://restolife.kz/upload/information_system_6/2/3/3/item_23346/information_items_property_28477.jpg',
        'https://restolife.kz/upload/information_system_6/3/8/2/item_382/information_items_property_116.jpg',
        'https://static4.depositphotos.com/1015060/494/i/600/depositphotos_4947647-stock-photo-restaurant.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/1a/08/d9/91/salle-du-restaurant.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/1a/08/db/08/salle-du-restaurant.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/1a/08/d9/ca/salle-du-restaurant.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/18/db/49/55/getlstd-property-photo.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/11/20/f9/3c/photo1jpg.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/11/21/12/b9/great-place-with-tasty.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/17/67/0a/42/new-disco-bar-restaurant.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/14/8f/7b/08/caption.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/19/a3/03/ff/the-secret.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/19/a3/04/70/good-place.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/07/83/4a/65/dubb-kebab-restaurant.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/18/92/73/81/restaurant.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/10/c9/ca/45/20170926-170359-largejpg.jpg',
        'https://restolife.kz/upload/information_system_6/3/5/9/item_3594/information_items_property_2676.jpg',
        'https://astana.restolife.kz/upload/information_system_30/1/1/9/item_11932/information_items_property_11764.jpg',
        'https://restolife.kz/upload/information_system_6/2/3/0/item_23038/information_items_property_27348.jpg',
        'https://media-cdn.tripadvisor.com/media/photo-s/1a/08/d9/91/salle-du-restaurant.jpg',
        'https://loveincorporated.blob.core.windows.net/contentimages/gallery/5741ee44-16e8-4bef-b066-2d8aff58eab1-seaside_restaurants_marine_room.jpg',
        'https://webgrowhub.com/wp-content/uploads/2020/12/photo-1552566626-52f8b828add9.jpg'
    ];

    public function restaurant() : string
    {
        return static::randomElement(static::$restaurants);
    }
}
