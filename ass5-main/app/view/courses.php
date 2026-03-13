<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>รายวิชาที่เปิดให้ลงทะเบียน</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        palette: {
                            light: '#635985',
                            mid: '#443C68',
                            dark: '#393053',
                            bg: '#18122B'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }
    </style>
</head>

<body class="bg-palette-bg text-gray-200 p-4 md:p-8 min-h-screen">

    <div class="max-w-7xl mx-auto">

        <div class="flex justify-end mb-8 w-full">
            <nav class="bg-palette-dark border border-palette-mid px-2 py-2 rounded-full shadow-lg flex items-center gap-1 md:gap-2">
                <a href="index.php?action=home" class="px-4 py-2 rounded-full text-sm font-semibold text-gray-300 hover:bg-palette-mid hover:text-white transition-all">หน้าแรก</a>
                <a href="index.php?action=profile" class="px-4 py-2 rounded-full text-sm font-semibold text-gray-300 hover:bg-palette-mid hover:text-white transition-all">ข้อมูลนักเรียน</a>
                <a href="index.php?action=courses" class="px-4 py-2 rounded-full text-sm font-semibold bg-palette-light text-white transition-all">รายวิชา</a>
                <a href="index.php?action=logout" class="px-4 py-2 rounded-full text-sm font-semibold text-red-400 hover:bg-red-500/20 transition-all">ออกจากระบบ</a>
            </nav>
        </div>

        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-white border-l-4 border-palette-light pl-4 mb-2">รายวิชาที่เปิดให้ลงทะเบียน</h1>
                <p class="text-gray-400 pl-5">เลือกรายวิชาที่คุณสนใจเพื่อลงทะเบียนเรียนในภาคการศึกษานี้</p>
            </div>

            <a href="index.php?action=add_course" class="inline-flex items-center justify-center bg-palette-mid text-white border border-palette-light hover:bg-palette-light px-6 py-3 rounded-xl font-bold transition-all duration-300 shadow-lg group">
                เพิ่มวิชาใหม่
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $my_ids = !empty($my_courses) ? array_column($my_courses, 'id') : [];
            if (!empty($courses)):
                foreach ($courses as $c):
            ?>

                    <div class="bg-palette-dark p-6 rounded-3xl shadow-xl border border-palette-mid hover:border-palette-light transition-all duration-300 transform hover:-translate-y-1 flex flex-col h-full relative group">
                        <div class="flex justify-between items-start mb-4">
                            <span class="inline-block px-3 py-1 bg-palette-bg text-gray-300 text-xs font-bold rounded-full tracking-wider border border-palette-mid">
                                <?= htmlspecialchars($c['course_code'] ?? '-') ?>
                            </span>
                        </div>

                        <h3 class="text-xl font-bold text-white mb-2 leading-tight"><?= htmlspecialchars($c['course_name'] ?? '-') ?></h3>
                        <p class="text-gray-400 text-sm flex items-center mb-6 flex-grow">
                            👤 <?= htmlspecialchars($c['instructor'] ?? '-') ?>
                        </p>

                        <div class="mt-auto pt-4 border-t border-palette-mid">
                            <?php if (in_array($c['id'], $my_ids)): ?>
                                <span class="flex items-center justify-center w-full py-3 rounded-xl text-sm font-semibold bg-green-900/40 text-green-400 border border-green-800 cursor-default">
                                    ลงทะเบียนแล้ว
                                </span>
                            <?php else: ?>
                                <button onclick="if(confirm('ยืนยันการลงทะเบียนรายวิชา <?= htmlspecialchars($c['course_code']) ?>?')) window.location.href='index.php?action=register&id=<?= $c['id'] ?>'"
                                    class="w-full flex items-center justify-center bg-palette-light hover:bg-[#736a99] text-white text-sm font-bold py-3 rounded-xl shadow-lg transition-all transform hover:-translate-y-0.5">
                                    ลงทะเบียนเรียน
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach;
            else: ?>
                <div class="col-span-1 md:col-span-2 lg:col-span-3 py-16 text-center bg-palette-dark rounded-3xl border border-palette-mid">
                    <p class="text-xl text-gray-400">ยังไม่มีวิชาเปิดสอนในขณะนี้</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>