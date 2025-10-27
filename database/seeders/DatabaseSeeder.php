<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Donation;
use App\Models\ProjectUpdate;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create();

        $projectsData = [
            [
                'title' => 'Restorasi Hutan Mangrove Pesisir Demak',
                'location' => 'Demak, Jawa Tengah',
                'short_description' => 'Menanam kembali 50.000 pohon mangrove untuk melindungi garis pantai dari abrasi dan menyediakan habitat bagi biota laut.',
                'body' => '<p>Proyek ini berfokus pada pemulihan ekosistem mangrove yang rusak di sepanjang pesisir Demak. Abrasi telah menjadi masalah serius, dan restorasi ini akan membantu menciptakan benteng alami.</p><p>Kami akan bekerja sama dengan kelompok nelayan setempat untuk penanaman dan pemeliharaan.</p>',
                'target_trees' => 50000,
                'cost_per_tree' => 15000,
                'partner_name' => 'Yayasan Mangrove Lestari',
                'status' => 'active',
                'updates' => [
                    ['title' => 'Kick-off Proyek', 'content' => 'Proyek secara resmi dimulai dengan sosialisasi kepada masyarakat setempat.'],
                    ['title' => 'Pembibitan 10.000 Pohon', 'content' => '10.000 bibit mangrove pertama telah berhasil disemai dan siap tanam.'],
                ]
            ],
            [
                'title' => 'Penghijauan Koridor Satwa Liar di Taman Nasional Gunung Leuser',
                'location' => 'Taman Nasional Gunung Leuser, Aceh',
                'short_description' => 'Menghubungkan kembali area hutan yang terfragmentasi untuk menciptakan jalur aman bagi gajah dan orangutan.',
                'body' => '<p>Fragmentasi habitat adalah ancaman utama bagi satwa liar di Leuser. Proyek ini bertujuan menanam pohon buah-buahan dan pohon asli di area kritis untuk memulihkan koridor satwa.</p>',
                'target_trees' => 75000,
                'cost_per_tree' => 20000,
                'partner_name' => 'Leuser Conservation Forum (FKL)',
                'status' => 'active',
                'updates' => [
                    ['title' => 'Survei Lokasi Selesai', 'content' => 'Tim telah memetakan area kritis untuk penanaman koridor.'],
                    ['title' => 'Penanaman Tahap Pertama', 'content' => '5.000 pohon telah ditanam di titik awal koridor.'],
                    ['title' => 'Patroli Perdana', 'content' => 'Tim patroli mulai mengamankan area yang baru ditanami.'],
                ]
            ],
            [
                'title' => 'Reboisasi Lahan Kritis di Lereng Gunung Rinjani',
                'location' => 'Lombok, Nusa Tenggara Barat',
                'short_description' => 'Memulihkan lahan kritis bekas kebakaran hutan untuk mencegah erosi dan memulihkan sumber mata air.',
                'body' => '<p>Kebakaran hutan telah merusak sebagian lereng Rinjani. Kami akan menanam pohon endemik untuk memulihkan tutupan lahan, mencegah tanah longsor, dan melindungi sumber daya air bagi masyarakat di kaki gunung.</p>',
                'target_trees' => 100000,
                'cost_per_tree' => 18000,
                'partner_name' => 'Komunitas Peduli Rinjani',
                'status' => 'pending',
                'updates' => [
                    ['title' => 'Penggalangan Dana Dimulai', 'content' => 'Proyek sedang dalam tahap penggalangan dana dan sosialisasi awal.'],
                ]
            ],
            [
                'title' => 'Agroforestri Kopi di Dataran Tinggi Gayo',
                'location' => 'Gayo, Aceh',
                'short_description' => 'Membantu petani kopi menerapkan sistem agroforestri (wana tani) untuk meningkatkan kesejahteraan dan menjaga hutan.',
                'body' => '<p>Kami akan memberikan bibit pohon naungan (seperti lamtoro, alpukat) kepada petani kopi. Sistem ini akan meningkatkan kualitas kopi, memberikan pendapatan tambahan, dan menjaga keanekaragaman hayati.</p>',
                'target_trees' => 40000,
                'cost_per_tree' => 22000,
                'partner_name' => 'Koperasi Petani Kopi Gayo',
                'status' => 'active',
                'updates' => [
                    ['title' => 'Distribusi 5.000 Bibit Pohon Naungan', 'content' => 'Bibit pohon naungan tahap pertama telah didistribusikan ke 50 petani.'],
                    ['title' => 'Pelatihan Kompos', 'content' => 'Petani mendapatkan pelatihan pembuatan kompos organik untuk mengurangi pupuk kimia.'],
                ]
            ],
            [
                'title' => 'Penanaman Pohon Sagu untuk Ketahanan Pangan Papua',
                'location' => 'Kabupaten Asmat, Papua',
                'short_description' => 'Menanam 20.000 pohon sagu sebagai sumber pangan utama dan menjaga ekosistem rawa gambut.',
                'body' => '<p>Sagu adalah makanan pokok di Asmat. Proyek ini bertujuan untuk merevitalisasi kebun-kebun sagu rakyat, memastikan ketahanan pangan, dan melestarikan kearifan lokal sekaligus menjaga lahan gambut.</p>',
                'target_trees' => 20000,
                'cost_per_tree' => 30000,
                'partner_name' => 'Yayasan Pembangunan Asmat',
                'status' => 'active',
                'updates' => [
                    ['title' => 'Pendataan Lahan Ulayat', 'content' => 'Proses pendataan dan perizinan dengan masyarakat adat telah selesai.'],
                    ['title' => 'Penanaman 1.000 Bibit Sagu', 'content' => 'Penanaman simbolis 1.000 bibit sagu telah dilakukan bersama tetua adat.'],
                ]
            ],
            [
                'title' => 'Hutan Kota di Lahan Bekas TPA',
                'location' => 'Bekasi, Jawa Barat',
                'short_description' => 'Mereklamasi lahan bekas tempat pembuangan akhir menjadi ruang terbuka hijau dan hutan kota.',
                'body' => '<p>Transformasi lahan kritis menjadi hutan kota untuk memperbaiki kualitas udara, mengurangi polusi, dan menyediakan area rekreasi sehat bagi warga sekitar.</p>',
                'target_trees' => 35000,
                'cost_per_tree' => 25000,
                'partner_name' => 'Dinas Lingkungan Hidup Setempat',
                'status' => 'completed',
                'updates' => [
                    ['title' => 'Penutupan Lahan TPA', 'content' => 'Area yang akan direklamasi telah resmi ditutup dan ditimbun lapisan tanah atas.'],
                    ['title' => 'Penanaman 35.000 Pohon Selesai', 'content' => 'Target 35.000 pohon telah tercapai. Area kini dalam tahap pemeliharaan.'],
                    ['title' => 'Peresmian Hutan Kota', 'content' => 'Hutan kota telah diresmikan dan dibuka untuk umum.'],
                ]
            ],
            [
                'title' => 'Restorasi Gambut di Kalimantan Tengah',
                'location' => 'Pulang Pisau, Kalimantan Tengah',
                'short_description' => 'Menanam kembali 150.000 pohon asli di lahan gambut bekas terbakar untuk mencegah kebakaran.',
                'body' => '<p>Lahan gambut yang kering sangat rentan terbakar. Proyek ini berfokus pada penanaman kembali pohon-pohon endemik (seperti Jelutung, Ramin) dan pembasahan kembali gambut (rewetting).</p>',
                'target_trees' => 150000,
                'cost_per_tree' => 17000,
                'partner_name' => 'Badan Restorasi Gambut (BRG)',
                'status' => 'active',
                'updates' => [
                    ['title' => 'Pembangunan Sekat Kanal', 'content' => '50 sekat kanal telah dibangun untuk menjaga level air di lahan gambut.'],
                    ['title' => 'Pembibitan Pohon Jelutung', 'content' => '20.000 bibit pohon Jelutung sedang disiapkan di persemaian rakyat.'],
                ]
            ],
            [
                'title' => 'Konservasi Pohon Ulin (Kayu Besi) di Kutai Kartanegara',
                'location' => 'Kutai Kartanegara, Kalimantan Timur',
                'short_description' => 'Melestarikan pohon Ulin yang terancam punah melalui penanaman terfokus di area konservasi.',
                'body' => '<p>Pohon Ulin adalah flora ikonik Kalimantan yang kini sulit ditemukan. Proyek ini mendedikasikan area khusus untuk menanam dan melindungi 5.000 pohon Ulin untuk generasi mendatang.</p>',
                'target_trees' => 5000,
                'cost_per_tree' => 50000,
                'partner_name' => 'Fakultas Kehutanan Unmul',
                'status' => 'pending',
                'updates' => [
                    ['title' => 'Pencarian Bibit Unggul', 'content' => 'Tim sedang dalam proses mencari dan mengumpulkan bibit pohon Ulin berkualitas.'],
                ]
            ],
            [
                'title' => 'Penanaman Pohon Buah Langka Nusantara',
                'location' => 'Kebun Raya Bogor, Jawa Barat',
                'short_description' => 'Mengkonservasi pohon buah-buahan langka Indonesia (Kepel, Bisbul, Menteng) di area khusus.',
                'body' => '<p>Banyak buah asli Indonesia yang mulai terlupakan. Bekerja sama dengan Kebun Raya Bogor, kami akan membuat arboretum pohon buah langka sebagai sarana edukasi dan konservasi.</p>',
                'target_trees' => 1000,
                'cost_per_tree' => 75000,
                'partner_name' => 'Kebun Raya Bogor (BRIN)',
                'status' => 'completed',
                'updates' => [
                    ['title' => 'Pengumpulan Bibit Selesai', 'content' => '100 jenis bibit pohon buah langka telah terkumpul.'],
                    ['title' => 'Penanaman 1.000 Pohon Tuntas', 'content' => 'Seluruh pohon telah ditanam di area yang ditentukan dan diberi label.'],
                ]
            ],
            [
                'title' => 'Sabuk Hijau (Green Belt) Candi Borobudur',
                'location' => 'Magelang, Jawa Tengah',
                'short_description' => 'Menciptakan sabuk hijau di sekitar zona 2 Candi Borobudur untuk menahan erosi dan memperindah lanskap.',
                'body' => '<p>Proyek ini bertujuan untuk menanam pohon-pohon peneduh dan pohon berbunga di area sekitar Candi Borobudur. Ini akan membantu menahan erosi tanah di perbukitan sekitar dan menyejukkan iklim mikro.</p>',
                'target_trees' => 25000,
                'cost_per_tree' => 20000,
                'partner_name' => 'Balai Konservasi Borobudur',
                'status' => 'active',
                'updates' => [
                    ['title' => 'Pemetaan Area Tanam', 'content' => 'Area tanam di zona 2 telah ditentukan dan disetujui oleh BKB.'],
                    ['title' => 'Penanaman 2.500 Pohon Pertama', 'content' => 'Penanaman awal telah dilakukan, berfokus pada pohon Bodhi dan Kepel.'],
                ]
            ],
        ];

        $projectIds = [];

        foreach ($projectsData as $data) {
            $updates = $data['updates'];
            unset($data['updates']);

            $data['slug'] = Str::slug($data['title']);

            $project = Project::create($data);

            $projectIds[] = $project->id;

            foreach ($updates as $updateData) {
                ProjectUpdate::create([
                    'project_id' => $project->id,
                    'title' => $updateData['title'],
                    'content' => $updateData['content'],
                    'image_url' => fake()->imageUrl(640, 480, 'nature', true),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $projectIdsCollection = collect($projectIds);

        for ($i = 0; $i < 100; $i++) {

            $projectId = $projectIdsCollection->random();

            $project = Project::find($projectId);

            $trees = rand(1, 15);
            $amount = $project->cost_per_tree * $trees;

            Donation::factory()->create([
                'project_id' => $project->id,
                'user_id' => null,
                'donor_name' => fake()->name(),
                'donor_email' => fake()->safeEmail(),
                'amount' => $amount,
                'tree_quantity' => $trees,
                'status' => 'paid',
            ]);
        }
    }
}
