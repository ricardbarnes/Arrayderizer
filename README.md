
# Arrayderizer
Render full HTML pages from a _**nested associative array**_ that uses a very simple and specific format to map the elements, their attributes and their content properly, based on four keywords:
* ```element```
* ```attributes```
* ```text```
* ```elements```
### Overview
```php
$data = [
    'element' => 'html',
    'elements' => [
        [
            'element' => 'head',
            'elements' => [
                [
                    'element' => 'meta',
                    'attributes' => [
                        'charset' => 'UTF-8'
                    ]
                ],
                [
                    'element' => 'title',
                    'text' => 'some title'
                ]
            ],
        ],
        [
            'element' => 'body',
            'elements' => [
                [
                    'element' => 'p',
                    'text' => 'some text content'
                ]
            ]
        ]
    ]
];

$arrayderizer = new Renderizer();
$arrayderizer->setData($data);
$arrayderizer->renderize();
echo $arrayderizer->getRenderized();
```
You will just get a single HTML line as it follows:
```html
<!DOCTYPE html><html><head><meta charset="UTF-8"><title>some title</title></head><body><p>some text content</p></body></html>
```
#### What is it for?
* Build HTML codes dynamically

_Of course, an associative array builder implementation (and maybe some more things) should be considered._


#### How does it work?
Fundamentally, it's just a pHTML class extension that handles the array information and passes it throught a simple recursive function that builds up all the document structure.
### Keywords
The library keywords explain themselves, but, here goes the reference:

* ```element```

The _**element**_ key holds **a single value** that will be the HTML element name.

```php
'element' => 'div' // a <div> element
```

* ```attributes```

The _**attributes**_ key holds **an array** that will contain all the _key_ (attribute name) - _value_ (attribute value) pairs that will define all the attributes of an element.
```php
'attriubtes' => [
		'id' => 'main',
		'class' => 'normal-class'
	]
```

* ```text```

The _**text**_ key holds **a single value** that will be the inner content of the element.
```php
'text' => 'some text'
```

* ```elements```

The _**elements**_ key holds **an array** that will contain all the inner elements of the current element.
```php
'elements' => [
		'element' => 'div',
		'elements' => [
				'element' => 'div'
			],
			[
				'element' => 'p'
			]
	]
```

Naturally multiple elements with multiple attributes and texts can be added.

### Render

In order to render the array into a valid HTML code, there are few steps:
```php
// create a new Renderizer object
$renderizer = new Renderizer();

// set the proper array as renderizer data
$renderizer->setData($data_array);

// renderize the data
$renderizer->renderize();

// get the renderizable HTML code
$code = $renderizer->getRenderized();

// print the HTML code
echo $code;
```

### About

This component is helping me to achieve some goals into a much bigger project, and it might be also useful to other people, so I'm just sharing it :)
