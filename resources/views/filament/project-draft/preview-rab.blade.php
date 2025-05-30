@php
$items = $getState() ?? [];
@endphp


@if (count($items))
<table class="w-full text-sm table-auto border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1">Group</th>
            <th class="border px-2 py-1">AHS</th>
            <th class="border px-2 py-1 text-right">Volume</th>
            <th class="border px-2 py-1 text-right">Harga Satuan</th>
            <th class="border px-2 py-1 text-right">Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0; @endphp
        @foreach ($items as $item)
        @php
        $ahs = \App\Models\CostPlaning\Ahs::with('items')->find($item['ahs_id']);
        $group = \App\Models\CostPlaning\AhsGroup::find($item['ahs_group_id']);
        $volume = (float) ($item['volume'] ?? 0);


        $ahs_unit_price = $ahs?->items?->sum(function($i) {
        return $i->unit_price * $i->coefficient;
        }) ?? 0;


        $subtotal = $ahs_unit_price * $volume;
        $total += $subtotal;
        @endphp
        <tr>
            <td class="border px-2 py-1">{{ $group->name ?? '-' }}</td>
            <td class="border px-2 py-1">{{ $ahs->name ?? '-' }}</td>
            <td class="border px-2 py-1 text-right">{{ $volume }}</td>
            <td class="border px-2 py-1 text-right">Rp {{ number_format($ahs_unit_price, 0, ',', '.') }}</td>
            <td class="border px-2 py-1 text-right">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
        </tr>
        @endforeach
        <tr class="bg-gray-50 font-semibold">
            <td colspan="4" class="border px-2 py-1 text-right">Total</td>
            <td class="border px-2 py-1 text-right">Rp {{ number_format($total, 0, ',', '.') }}</td>
        </tr>
    </tbody>
</table>
@else
<p class="text-gray-500 italic">Belum ada AHS ditambahkan.</p>
@endif