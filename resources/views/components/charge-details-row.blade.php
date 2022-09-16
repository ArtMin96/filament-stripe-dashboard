@props(['label' => null, 'value' => null])

<tr class="border-b border-gray-200 dark:border-gray-700">
    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
        {{ $label }}
    </th>
    <td class="py-4 px-6">

        {{ $value ?: $slot }}
    </td>
</tr>
