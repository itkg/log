<?php

namespace Lemon\Log\Helper;

interface IdGeneratorInterface
{
	public function generate($start = 1000, $end = 1000000, $char = '#', $bdate = true);
}