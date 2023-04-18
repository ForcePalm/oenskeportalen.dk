<?php

namespace MixerApi\CollectionView\Test\TestCase\View;

use Cake\Routing\Router;
use Cake\TestSuite\TestCase;
use MixerApi\CollectionView\Configuration;

class XmlCollectionViewTest extends TestCase
{
    /**
     * @var string[]
     */
    public $fixtures = [
        'plugin.MixerApi/CollectionView.Actors',
        'plugin.MixerApi/CollectionView.FilmActors',
        'plugin.MixerApi/CollectionView.Films',
    ];

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        static::setAppNamespace('MixerApi\CollectionView\Test\App');
        Router::reload();
        Router::connect('/', ['controller' => 'Actors', 'action' => 'index']);
        Router::connect('/:controller/:action/*');
        Router::connect('/:plugin/:controller/:action/*');
        (new Configuration())->default();
    }

    public function test_collection()
    {
        $controller = (new ControllerFactory())->build();

        $controller->viewBuilder()
            ->setClassName('MixerApi/CollectionView.XmlCollection')
            ->setOptions([
                'serialize' => 'actors'
            ]);
        $View = $controller->createView();
        $output = $View->render();

        $this->assertIsString($output);

        $simpleXml = simplexml_load_string($output);
        $this->assertInstanceOf(\SimpleXMLElement::class, $simpleXml);

        $this->assertEquals(2, (int)$simpleXml->collection->count);
        $this->assertEquals(20, (int)$simpleXml->collection->total);
        $this->assertEquals('/actors', $simpleXml->collection->url);
        $this->assertEquals('/?page=2', $simpleXml->collection->next);
        $this->assertEquals('/?page=10', $simpleXml->collection->last);

        $actor = $simpleXml->data[0];
        $this->assertInstanceOf(\SimpleXMLElement::class, $actor->films);
    }

    public function test_collection_serialize_array_items_one()
    {
        $controller = (new ControllerFactory())->build();

        $controller->viewBuilder()
            ->setClassName('MixerApi/CollectionView.XmlCollection')
            ->setOptions([
                'serialize' => ['actors']
            ]);
        $View = $controller->createView();
        $output = $View->render();

        $this->assertIsString($output);

        $simpleXml = simplexml_load_string($output);
        $this->assertInstanceOf(\SimpleXMLElement::class, $simpleXml);

        $this->assertEquals(2, (int)$simpleXml->collection->count);
        $this->assertEquals(20, (int)$simpleXml->collection->total);
        $this->assertEquals('/actors', $simpleXml->collection->url);
        $this->assertEquals('/?page=2', $simpleXml->collection->next);
        $this->assertEquals('/?page=10', $simpleXml->collection->last);

        $actor = $simpleXml->data[0];
        $this->assertInstanceOf(\SimpleXMLElement::class, $actor->films);
    }

    public function test_collection_serialize_array_items_two()
    {
        $controller = (new ControllerFactory())->build();

        $controller->viewBuilder()
            ->setVars([
                'actors' => $controller->viewBuilder()->getVar('actors'),
                'other_actors' => $controller->viewBuilder()->getVar('actors')
            ])
            ->setClassName('MixerApi/CollectionView.XmlCollection')
            ->setOptions([
                'serialize' => ['actors', 'other_actors']
            ]);
        $View = $controller->createView();
        $output = $View->render();

        $this->assertIsString($output);

        $simpleXml = simplexml_load_string($output);

        $this->assertTrue(isset($simpleXml->actors));
        $this->assertTrue(isset($simpleXml->other_actors));
    }

    public function test_collection_serialize_is_empty()
    {
        $controller = (new ControllerFactory())->build();

        $controller->viewBuilder()
            ->setClassName('MixerApi/CollectionView.XmlCollection')
            ->setOptions([
                'serialize' => []
            ]);
        $View = $controller->createView();
        $output = $View->render();

        $this->assertIsString($output);

        $simpleXml = simplexml_load_string($output);

        $this->assertInstanceOf(\SimpleXMLElement::class, $simpleXml);
        $this->assertEmpty(get_object_vars($simpleXml));
    }
}
