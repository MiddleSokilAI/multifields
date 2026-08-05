<?php namespace Multifields;

class multiFields
{
    /**
     * Normalize a MultiFields value, JSON string, or document TV into a name-keyed structure.
     *
     * @param array|string $data
     * @return array
     * @since 3.1.0
     */
    public function normalize(array|string $data): array
    {
        if (is_string($data)) {
            $decoded = json_decode($data, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                return is_array($decoded) ? $this->normalize($decoded) : [];
            }

            $data = evo()->documentObject[$data][1] ?? [];

            if (is_array($data)) {
                return $this->normalize($data);
            }

            if (is_string($data)) {
                $decoded = json_decode($data, true);

                return json_last_error() === JSON_ERROR_NONE && is_array($decoded) ? $this->normalize($decoded) : [];
            }

            return [];
        }

        $normalized = [];

        foreach ($data as $key => $item) {
            if (!is_array($item) || !empty($item['mf.hide'])) {
                continue;
            }

            $name = (string) ($item['name'] ?? $key);
            $items = $item['items'] ?? null;

            if (is_array($items)) {
                if (stripos($name, '_group') !== false) {
                    foreach ($items as $itemKey => $itemValue) {
                        $nestedItems = is_array($itemValue) ? ($itemValue['items'] ?? []) : [];
                        $normalized[$name][$itemKey] = $this->normalize(is_array($nestedItems) ? $nestedItems : []);
                    }
                } else {
                    $normalized[$key] = [
                        'name' => $name,
                        'items' => $this->normalize($items),
                    ];
                }

                continue;
            }

            $normalized[$name] = $item['value'] ?? '';
        }

        return $normalized;
    }
}
