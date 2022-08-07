<?php

namespace Formatter;

use Closure;

abstract class Formatter
{
    private Closure $formatter;

    public function setFormatter(Closure $formatter): void
    {
        $this->formatter = $formatter;
    }

    /** @param mixed|null $data */
    public function format($data, array $params = []): ?array
    {
        return call_user_func_array($this->formatter, array_merge([$data], $params));
    }

    public function formatList(iterable $list, array $params = []): array
    {
        $result = [];
        foreach ($list as $item)
            $result[] = $this->format($item, $params);
        return $result;
    }
}
