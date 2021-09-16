<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use function PHPUnit\Framework\throwException;

class post
{



	public static function find($slug)
	{
		if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
			throw new ModelNotFoundException();
		}

		return cache()->remember("post.{$slug}", now()->addHour(1), fn () => file_get_contents($path));
	}
}
