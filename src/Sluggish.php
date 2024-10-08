<?php

namespace LaravelCraft\Sluggish;

use LaravelCraft\Sluggish\Services\SeqIdentifier;
use LaravelCraft\Sluggish\Services\Slug;
use LaravelCraft\Sluggish\Services\Uuid;

class Sluggish
{
    public static function generate($type = 'slug', $parameter, $model = null, $modelField = null, $id = '0'): string
    {
        $generator = null;

        switch ($type) {
            case 'slug':
                $generator = new Slug();
                break;
            case 'uuid':
                $generator = new Uuid();
                break;
            case 'sequence':
                $generator = new SeqIdentifier();
                break;
                // Add more cases for other types if needed

            default:
                throw new \InvalidArgumentException("Unsupported type: $type");
        }

        return $generator->generate($parameter, $model, $modelField, $id);
    }
}
