<div style="padding: 20px; font-family: Arial, sans-serif;">
    <div style="margin-bottom: 20px;">
        <input type="text" style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ddd; border-radius: 4px;"
               placeholder="Search products..." wire:model.live="searchCard">
    </div>
    <table style="width: 100%; border-collapse: collapse; margin: 20px 0; font-size: 16px; text-align: left;">
        <thead>
            <tr style="background-color: #f4f4f4; border-bottom: 2px solid #ddd;">
                <th style="padding: 10px; border: 1px solid #ddd;">ID</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Name</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Price</th>
                <th style="padding: 10px; border: 1px solid #ddd;">TVA</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Quantity</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $item)
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $item['id'] }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $item['name'] }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $item['price'] }}</td>



                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $item['tva'] }}</td>
                    @if ($cartid!=$item['id'])
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $item['quantity'] }}</td>
                    @else
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        <input type="number" style="width: 60px;" wire:model="quantity"  min="1">
                    </td>
                    @endif

                    <td style="padding: 10px; border: 1px solid #ddd;">
                        <button class="btn btn-danger btn-sm" wire:click="removeItem({{ $item['id'] }})">Supprimer</button>
                        <button class="btn btn-primary btn-sm" wire:click="{{ $cartid == $item['id'] ? 'update' : 'edit(' . $item['id'] . ')' }}">{{ $cartid == $item['id'] ? 'Enregistrer' : 'Modifier' }}</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
