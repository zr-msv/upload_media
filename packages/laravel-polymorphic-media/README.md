# 📦 Laravel Polymorphic Media Package

A package to handle image uploads associated with any model via **polymorphic relationships**.

---

## 🚀 Installation

### 1. Add repository to your main app's `composer.json`:

``` json
"repositories": [
  {
    "type": "path",
    "url": "./packages/laravel-polymorphic-media"
  }
]
``` 
### 2. Require the package:
````  bash
composer require zm/laravel-polymorphic-media:dev-main
````

### 3. Run migration:
````  bash
php artisan migrate
````

## 🧩 Usage in Your Models
```` php
use Zm\PolymorphicMedia\Traits\HasMedia;

class Product extends Model
{
    use HasMedia;
}
````

## ⚙️ MediaService API
```` php
use Zm\PolymorphicMedia\Services\MediaService;

$service = new MediaService();

// Attach image
$media = $service->attachImage($model, $request->file('image'));

// Get all images
$images = $service->getImages($model);

// Delete an image
$service->deleteImage($media);

````

---

## 🛠 Automatic File Cleanup

This package automatically deletes the physical file from storage when a media record is deleted.

> 🔒 No need to manually remove files — the `MediaObserver` takes care of it for you.

Make sure your files are stored on the disk defined by `Storage::disk('public')`.




## 📂 Project Structure
````
laravel-polymorphic-media/
├── src/
│   ├── Models/
│   ├── Traits/
│   ├── Services/
│   └── PolymorphicMediaServiceProvider.php
├── database/
│   └── migrations/
├── composer.json
└── README.md
````
## 👤 Author
```` 
Developed by ZM
GitHub:https://github.com/zr-msv
````
