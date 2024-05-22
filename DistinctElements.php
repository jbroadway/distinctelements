<?php

/**
 * A pure PHP implementation of the Distinct Elements in Streams algorithm for estimating
 * the number of distinct elements in a set, from the following paper:
 * 
 * https://arxiv.org/abs/2301.10191
 * 
 * Usage:
 * 
 * 	    require __DIR__ . '/vendor/autoload.php';
 * 
 *      $stream = [1, 2, 3, 4, 1, 2, 3, 4, 5, 4, 3, 1, 2];
 *      $epsilon = 0.1;
 *      $delta = 0.1;
 * 
 *      $output = DistinctElements::streaming_algorithm ($stream, $epsilon, $delta);
 *      var_dump ($output); // 5
 */
class DistinctElements {
	public static function streaming_algorithm (array $stream, float $epsilon = 0.1, float $delta = 0.1) {
		$p = 1;
		$list = []; // keys are used so they're automatically unique
		$threshold = ceil ((12 / $epsilon ** 2) * log (8 * count ($stream) / $delta));

		// Process the stream
		foreach ($stream as $val) {
			if (! array_key_exists ($val, $list)) {
				$list[$val] = null;
			}

            if (mt_rand (0.0, 1.0) > $p) {
				unset ($list[$val]);
			}

            if (count ($list) == $threshold) {
                $list = array_filter ($list, self::random_filter);
				$p /= 2;
			}
        }

		return count ($list) / $p;
	}

    private static function random_filter ($val) {
        return (mt_rand (0.0, 1.0) >= 0.5);
    }
}
