# phpunit-assert-picture
New PhpUnit Assertions for testing Pictures (size, type, text content...)

# What
It's a set of Traits for adding new assertions on pictures

# How
Add the library :
```bash
$ composer require --dev trismegiste/phpunit-assert-picture
```

Use the traits in your TestCase subclass :
```php
class MyPictureTest extends \PHPUnit\Framework\TestCase
{
    use \Trismegiste\PhpunitAssertPicture\ImageSpecs;
    use \Trismegiste\PhpunitAssertPicture\TextContent;

    // ... your tests
```

# Examples
Here's a picture :

![Sample](https://github.com/Trismegiste/phpunit-assert-picture/blob/master/tests/fixtures/sample.png)

## Image attributes
We can call assertions with the full pathname of the picture or with a \GdImage instance :
```php
   /** @dataProvider getFixture */
   public function testPicture(string $pic)
   {
       // assertions on width and height :
       $this->assertDimension(128, 256, $pic);
       // assetion on mime-type :
       $this->assertMimeType('image/png', $pic);
       // assertion on orientation mode :
       $this->assertPortrait($pic);
   }
```

## Text contents
Assertion on text content inside the picture thanks to OCR :
```php
       $this->assertPictureContainsString('YOLO', $pic);
```

# Dependencies
* Tesseract
* GD2

# Contribute
Feel free to contribute with new fancy features