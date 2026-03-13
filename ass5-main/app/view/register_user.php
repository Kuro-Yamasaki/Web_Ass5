<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>สมัครสมาชิก</title>
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

    <div class="bg-palette-dark p-8 md:p-10 rounded-2xl shadow-2xl border border-palette-mid w-full max-w-lg">
        <h2 class="text-3xl font-bold text-white text-center mb-8">สมัครสมาชิกใหม่</h2>

        <form action="index.php?action=doRegister" method="POST" class="space-y-4">
            <input type="text" name="username" placeholder="Email" required class="w-full px-4 py-3 rounded-xl border border-palette-mid bg-palette-bg text-white placeholder-gray-500 focus:bg-palette-bg focus:ring-2 focus:ring-palette-light outline-none transition-all">

            <input type="password" name="password" placeholder="Password" required class="w-full px-4 py-3 rounded-xl border border-palette-mid bg-palette-bg text-white placeholder-gray-500 focus:bg-palette-bg focus:ring-2 focus:ring-palette-light outline-none transition-all">

            <div class="flex flex-col md:flex-row gap-4">
                <input type="text" name="first_name" placeholder="ชื่อจริง" required class="w-full px-4 py-3 rounded-xl border border-palette-mid bg-palette-bg text-white placeholder-gray-500 focus:bg-palette-bg focus:ring-2 focus:ring-palette-light outline-none transition-all">
                <input type="text" name="last_name" placeholder="นามสกุล" required class="w-full px-4 py-3 rounded-xl border border-palette-mid bg-palette-bg text-white placeholder-gray-500 focus:bg-palette-bg focus:ring-2 focus:ring-palette-light outline-none transition-all">
            </div>

            <div class="flex flex-col text-left">
                <label class="text-sm text-gray-400 ml-2 mb-1">วันเกิด:</label>
                <input type="date" name="birthdate" required class="w-full px-4 py-3 rounded-xl border border-palette-mid bg-palette-bg text-gray-300 focus:bg-palette-bg focus:ring-2 focus:ring-palette-light outline-none transition-all [color-scheme:dark]">
            </div>

            <input type="text" name="phone" placeholder="เบอร์โทรศัพท์" required class="w-full px-4 py-3 rounded-xl border border-palette-mid bg-palette-bg text-white placeholder-gray-500 focus:bg-palette-bg focus:ring-2 focus:ring-palette-light outline-none transition-all">

            <div class="pt-4 space-y-3">
                <button type="submit" class="w-full bg-palette-light hover:bg-[#736a99] text-white font-bold py-3 rounded-xl shadow-lg transition-all">ยืนยันการสมัคร</button>
                <button type="button" onclick="window.location.href='index.php?action=login'" class="w-full bg-transparent border border-palette-mid text-gray-300 font-semibold py-3 rounded-xl hover:bg-palette-mid hover:text-white transition-all">กลับไปหน้าล็อกอิน</button>
            </div>
        </form>
    </div>

</body>

</html>