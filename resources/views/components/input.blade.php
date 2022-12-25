<input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" {!! $attributes->merge(['class' => 'w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50',]) !!} placeholder="{{ $placeholder }}" @if ($type == 'number' || $type == 'tel') onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" @endif />
