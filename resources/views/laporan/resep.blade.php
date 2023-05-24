
    <h5>Resep Farmasi</h5>
    @forelse ($resep->NORESEP as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->KODEBARANG }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada resep farmasi</td>
                                        </tr>
                                    @endforelse

