# Beats Event
ระบบจัดการอีเวนต์

---

## Table of contents
- [Setup](#setup)
- [User Examples](#user-examples)
- [ඞ Contributors](#contributors)

---

## Setup
วิธีการติดตั้งโปรเจค
1. clone โปรเจคนี้มาใว้บนคอมพิเตอร์โดยใส่คำสั่งนี้ใน bash
    ```
    cd <ชื่อโฟล์เดอร์ที่ต้องการ>
    ```
    ```
    git clone https://github.com/OteEnded/WebTechMidTermProject-Beats_Headphone.git
    ```
2.  (หากยังไม่ได้ตั้ง alias สำหรับคำสั่ง sail) ให้ กำหนด alias สำหรับคำสั่ง sail ลงใน .bashrc โดยใช้คำสั่งดังกล่าว แล้ว restart terminal
    ```
    echo "alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'" >> ~/.bashrc
    ```
3. Copy ไฟล์ .env.example ไปที่ .env โดยใช้คำสั่ง
    ```
    cp .env.example .env
    ```
4. สร้าง APP_KEY ใน .env โดยใช้คำสั่ง
   ```
   sail artisan key:generate
   ```
5. สร้าง และ start container โดยใช้คำสั่ง
    ```
    sail up -d
    ```
6. ติดตั้ง package ที่จำเป็นโดยใช้คำสั่ง
    ```
    sail npm install
    ```
    ```
    sail yarn install
    ```
7. run ตัว dev ขึ้นมาทำให้ css ใช้งานได้
    ```
    sail yarn dev
    ```
8. migrate และ seed ข้อมูลเข้าไปใน database โดยใช้คำสั่ง
    ```
    sail artisan migrate:fresh --seed
    ```
9. เข้าสู่หน้าเว็บที่ http://localhost ผ่าน browser เช่น Chrome, Firefox, Edge, Safari หรืออื่นๆ

---

## User Examples
| Email               | Password | Role       |
|---------------------|----------|------------|
| mute@example.com    | mute     | Member     |
| roserin@example.com | roserin  | Accountant |
| smart@example.com   | smart    | Staff      |

* **Member** คือสมาชิกที่ลงทะเบียนแล้ว สามารถสมัครกิจกรรมได้
* **Staff** คือเจ้าหน้าที่กิจกรรม สามารถสร้าง และจัดการกิจกรรมได้
* **Accountant** คือพนักงานการเงิน สามารถอนุมัติหรือปฏิเสธคำร้องของบประมาณกิจกรรมได้

---

## Contributors
<table>
<tr>
<td align="center">
    <a href = "https://github.com/OteEnded">
        <img src = "https://avatars.githubusercontent.com/u/98574548?s=50" width="50" height="50"/><br>
        <sub><b> OteEnded </b> </sub>
    </a>
    <br>
</td>

<td align="center">
    <a href = "https://github.com/0akkung">
        <img src = "https://avatars.githubusercontent.com/u/98578165?s=50" width="50" height="50"/><br>
        <sub><b> 0akkung </b> </sub>
    </a>
    <br>
</td>

<td align="center">
    <a href = "https://github.com/NyxTheeranut">
        <img src = "https://avatars.githubusercontent.com/u/98580582?s=50" width="50" height="50"/><br>
        <sub><b> Nyx_Nyx </b> </sub>
    </a>
    <br>
</td>

<td align="center">
    <a href = "https://github.com/carry212121">
        <img src = "https://avatars.githubusercontent.com/u/98574257?s=50" width="50" height="50"/><br>
        <sub><b> carry212121 </b> </sub>
    </a>
    <br>
</td>
</tr>
</table>

---

<h1>This project is powered by Laravel.</h1>

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
