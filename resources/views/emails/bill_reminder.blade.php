{{-- resources/views/emails/bill_reminder.blade.php --}}

<x-mail::message>
# Pengingat Tagihan: {{ $bill->nama_tagihan }}

Halo {{ $userName }},

Ini adalah pengingat bahwa tagihan **{{ $bill->nama_tagihan }}** dengan jumlah **Rp{{ number_format($bill->harga, 2, ',', '.') }}** akan jatuh tempo **besok**, yaitu pada tanggal **{{ \Carbon\Carbon::parse($bill->tanggal_jatuh_tempo)->format('d F Y') }}**.

Mohon segera lakukan pembayaran agar tidak melewati batas waktu.

<x-mail::button :url="route('user.bills.index')">
Lihat Tagihan Anda
</x-mail::button>

Terima kasih,<br>
Tim TaroBill
</x-mail::message>