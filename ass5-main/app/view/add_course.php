<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>เพิ่มรายวิชาใหม่</title>
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

<body class="bg-palette-bg min-h-screen flex items-center justify-center p-4">

    <div class="bg-palette-dark p-8 md:p-10 rounded-3xl shadow-2xl border border-palette-mid w-full max-w-lg relative overflow-hidden">

        <h2 class="text-3xl font-bold text-white mb-2">เพิ่มรายวิชาใหม่ 📚</h2>
        <p class="text-gray-400 mb-8">กรอกข้อมูลรายละเอียดของรายวิชาที่ต้องการเปิดสอน</p>

        <form action="index.php?action=doAddCourse" method="POST" class="space-y-5 relative z-10">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">รหัสวิชา</label>
                <input type="text" name="course_code" placeholder="เช่น CS101" required
                    class="w-full px-4 py-3 rounded-xl border border-palette-mid bg-palette-bg text-white placeholder-gray-500 focus:bg-palette-bg focus:ring-2 focus:ring-palette-light focus:border-palette-light outline-none transition-all">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">ชื่อรายวิชา</label>
                <input type="text" name="course_name" placeholder="เช่น Introduction to Programming" required
                    class="w-full px-4 py-3 rounded-xl border border-palette-mid bg-palette-bg text-white placeholder-gray-500 focus:bg-palette-bg focus:ring-2 focus:ring-palette-light focus:border-palette-light outline-none transition-all">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">ชื่ออาจารย์ผู้สอน</label>
                <input type="text" name="instructor" placeholder="เช่น Prof. Smith" required
                    class="w-full px-4 py-3 rounded-xl border border-palette-mid bg-palette-bg text-white placeholder-gray-500 focus:bg-palette-bg focus:ring-2 focus:ring-palette-light focus:border-palette-light outline-none transition-all">
            </div>

            <div class="pt-4 flex gap-3">
                <button type="button" onclick="window.history.back();"
                    class="w-1/3 bg-transparent border border-palette-mid text-gray-300 font-semibold py-3 rounded-xl hover:bg-palette-mid hover:text-white transition-all">
                    ยกเลิก
                </button>
                <button type="submit"
                    class="w-2/3 bg-palette-light hover:bg-[#736a99] text-white font-bold py-3 rounded-xl shadow-lg transition-all transform hover:-translate-y-0.5">
                    บันทึกรายวิชา
                </button>
            </div>
        </form>
    </div>

</body>

</html>