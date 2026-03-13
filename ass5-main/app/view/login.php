<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>เข้าสู่ระบบ</title>
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

    <div class="bg-palette-dark p-8 md:p-10 rounded-2xl shadow-2xl border border-palette-mid w-full max-w-md transform transition-all hover:-translate-y-1">
        <h2 class="text-3xl font-bold text-white text-center mb-8">ระบบลงทะเบียนเรียน</h2>

        <form action="index.php?action=doLogin" method="POST" class="space-y-5">
            <div>
                <input type="text" name="username" placeholder="Email" required
                    class="w-full px-4 py-3 rounded-xl border border-palette-mid bg-palette-bg text-white placeholder-gray-400 focus:bg-palette-bg focus:ring-2 focus:ring-palette-light focus:border-palette-light outline-none transition-all">
            </div>
            <div>
                <input type="password" name="password" placeholder="Password" required
                    class="w-full px-4 py-3 rounded-xl border border-palette-mid bg-palette-bg text-white placeholder-gray-400 focus:bg-palette-bg focus:ring-2 focus:ring-palette-light focus:border-palette-light outline-none transition-all">
            </div>

            <button type="submit" class="w-full bg-palette-light hover:bg-[#736a99] text-white font-bold py-3 rounded-xl shadow-lg transition-all transform hover:-translate-y-0.5">
                เข้าสู่ระบบ
            </button>

            <button type="button" onclick="window.location.href='index.php?action=register_user'"
                class="w-full bg-transparent text-gray-300 font-semibold py-3 rounded-xl border border-palette-mid hover:bg-palette-mid hover:text-white transition-all">
                สมัครสมาชิกใหม่
            </button>
        </form>
    </div>

</body>

</html>