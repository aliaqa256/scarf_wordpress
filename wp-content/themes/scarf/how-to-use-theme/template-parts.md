# راهنمای بخش‌های صفحه اصلی (Template Parts)

صفحه اصلی از چند بخش (template part) تشکیل شده. هر بخش یک فایل PHP جداگانه داره که در `front-page.php` فراخوانی میشه.

## ساختار صفحه اصلی

```
┌─────────────────────────────┐
│  hero-section.php           │  ← بنر اصلی بالای صفحه
├─────────────────────────────┤
│  section-categories.php     │  ← دسته‌بندی محصولات
├─────────────────────────────┤
│  Widget Area: homepage-top  │  ← محل قرارگیری ابزارک
├─────────────────────────────┤
│  section-offers.php         │  ← محصولات تخفیف‌دار
├─────────────────────────────┤
│  section-new-arrivals.php   │  ← جدیدترین محصولات
├─────────────────────────────┤
│  section-best-sellers.php   │  ← پرفروش‌ترین‌ها
├─────────────────────────────┤
│  section-services.php       │  ← نمادهای خدمات (ارسال، ضمانت و...)
├─────────────────────────────┤
│  Widget Area: homepage-bottom│ ← محل قرارگیری ابزارک
└─────────────────────────────┘
```

---

## توضیح هر بخش

### ۱. hero-section.php — بنر اصلی
- بنر تمام‌عرض بالای صفحه
- شامل عنوان، توضیحات و دکمه CTA
- از تنظیمات سفارشی‌ساز خوانده میشه

### ۲. section-categories.php — دسته‌بندی‌ها
- نمایش دسته‌بندی‌های اصلی محصولات
- از WooCommerce categories استفاده میکنه

### ۳. section-offers.php — محصولات تخفیف‌دار
- محصولاتی که تخفیف دارن رو نمایش میده
- از WooCommerce Sale products استفاده میکنه

### ۴. section-new-arrivals.php — جدیدترین‌ها
- جدیدترین محصولات اضافه شده
- از WooCommerce Recent products استفاده میکنه

### ۵. section-best-sellers.php — پرفروش‌ها
- پرفروش‌ترین محصولات
- از WooCommerce Best Selling products استفاده میکنه

### ۶. section-services.php — نمادهای خدمات
- ۴ نماد: ارسال سریع، ضمانت بازگشت، پرداخت امن، پشتیبانی
- محتوا مستقیماً در کد PHP تعریف شده

---

## نحوه تغییر ترتیب بخش‌ها

فایل `front-page.php` رو ویرایش کن و ترتیب `get_template_part()` ها رو عوض کن:

```php
// مثال: اول offers، بعد categories
get_template_part( 'template-parts/section-offers' );
get_template_part( 'template-parts/section-categories' );
```

---

## نحوه حذف یک بخش

خط `get_template_part()` مربوطه رو کامنت کن یا حذف کن:

```php
// get_template_part( 'template-parts/section-offers' ); // این بخش حذف شد
```

---

## نحوه اضافه کردن بخش جدید

1. فایل جدیدی در `template-parts/` بساز (مثلاً `section-sale.php`)
2. کد HTML/PHP خودت رو بنویس
3. در `front-page.php` فراخوانی کن:

```php
get_template_part( 'template-parts/section-sale' );
```

---

## Widget Area ها

### homepage-top
- بین دسته‌بندی و پیشنهادات ویژه
- برای قرار دادن ابزارک‌های تبلیغاتی یا بنرهای سفارشی مناسبه

### homepage-bottom
- بعد از پرفروش‌ها
- برای قرار دادن ابزارک‌های وبلاگ، اینستاگرام و... مناسبه

**نحوه مدیریت:** پیشخوان ← نمایش ← ابزارک‌ها
