<?php

namespace Walnut\Lib\DbQuery\ResultBag;

/**
 * @package Walnut\Lib\DbQuery
 */
abstract class ResultBag {

	public function __construct(
		protected readonly array $data
	) {}

	/**
	 * @var array<string, array<int|string>>
	 */
	private array $cacheByKey = [];

	/**
	 * @param string $key
	 * @return array<int|string>
	 */
	public function collect(string $key): array {
		return $this->cacheByKey[$key] ??= $this->extractValues($key);
	}

	/**
	 * @param string $key
	 * @return array<int|string>
	 */
	abstract protected function extractValues(string $key): array;

	abstract public function modify(\Generator $generator): self;

	public function all(): array {
		return $this->data;
	}

	public function keys(): array {
		return array_keys($this->data);
	}

	public function withKey(string $key): mixed {
		return $this->data[$key] ?? null;
	}

}



