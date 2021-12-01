<?php

class HomeCodingTest
{
	public static function aboveBelow(array $integers, int $comparison): array
	{
		$above = 0;
		$below = 0;
		foreach ($integers as $integer) {
			if ($integer < $comparison) {
				$below++;
			} else if ($integer > $comparison) {
				$above++;
			}
		}

		return [
			"above" => $above,
			"below" => $below
		];
	}

	public static function stringRotation(string $original_str, int $rotation): string
	{
		if ($rotation < 1) throw new \InvalidArgumentException('Rotation must be a positive integer.');

		$count = strlen($original_str);

		// avoid unnecessary rotations
		$rotation = $rotation % $count;

		// str_split doesn't support negative indexes, so we have to do it ourselves
		$negative_index = $count - $rotation;

		// count backwards from the end of the string, then move the last chunk
		// to the front
		$output = array_reverse(str_split($original_str, $negative_index));

		return join('', $output);
	}
}
