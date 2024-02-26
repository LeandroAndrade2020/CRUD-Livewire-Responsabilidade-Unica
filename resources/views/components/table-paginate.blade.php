@props([
    'data' => null,
])
<div class="flex px-2 py-3 space-x-2 bg-gray-50">
        <div class="w-full">
            {{ $data->onEachSide(1)->links() }}
        </div>
        <div>
        <x-ts-select.native wire:model.live="paginate" :options="[
            ['label' => '5 por página', 'value' => 5],
            ['label' => '10 por página', 'value' => 10],
            ['label' => '25 por página', 'value' => 25],
            ['label' => '50 por página', 'value' => 50],
            ['label' => '100 por página', 'value' => 100],
        ]" select="label:label|value:value" />
    </div>
</div>
