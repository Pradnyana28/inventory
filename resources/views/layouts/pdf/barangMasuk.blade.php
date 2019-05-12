<table style="width: 100%;">
    <tbody>
        <tr>
            <td>Laporan dari tanggal {{ $start }} sampai {{ $end }}.</td>
        </tr>

        <tr>
            <td style="padding: 20px 0 0 0;">
                <table style="width: 100%; border-collapse: collapse;" border="1">
                    <tr>
                        <th style="padding: 10px;">Tgl. Masuk</th>
                        <th style="padding: 10px;">Kode Barang</th>
                        <th style="padding: 10px;">Nama Barang</th>
                        <th style="padding: 10px;">Jumlah</th>
                    </tr>
                
                    @if (count($data) > 0)
                        @foreach ($data as $d)
                        <tr>
                            <td style="padding: 6px;">{{ $d->created_at }}</td>
                            <td style="padding: 6px;">{{ $d->kode_barang }}</td>
                            <td style="padding: 6px;">{{ $d->barang->nama_barang }}</td>
                            <td style="padding: 6px;">{{ $d->jumlah }}</td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" style="padding: 6px; text-align: center;">Tidak Ada Data Untuk Ditampilkan.</td>
                        </tr>
                    @endif
                </table>
            </td>
        </tr>
    </tbody>
</table>