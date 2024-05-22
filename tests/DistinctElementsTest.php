<?php

use distinctelements\DistinctElements;

final class DistinctElementsTest extends \PHPUnit\Framework\TestCase {
	public function test_streaming_algorithm () {
		$epsilon = 0.1;
		$delta = 0.1;

		$stream = [1, 2, 3, 1, 2, 3];

		$output = DistinctElements::streaming_algorithm ($stream, $epsilon, $delta);
		static::assertSame (3, $output);

		$stream = [1, 2, 3, 4, 1, 2, 3, 4, 5, 4, 3, 1, 2];

		$output = DistinctElements::streaming_algorithm ($stream, $epsilon, $delta);
		static::assertSame (5, $output);

		$stream = [1, 2, 3, 4, 1, 2, 3, 4, 5, 4, 3, 1, 2, 6, 4, 5, 8, 7, 0, 9];

		$output = DistinctElements::streaming_algorithm ($stream, $epsilon, $delta);
		static::assertSame (10, $output);
	}
}
