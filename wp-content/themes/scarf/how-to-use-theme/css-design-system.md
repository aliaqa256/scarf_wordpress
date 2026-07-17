# سیستم طراحی و توکن‌های CSS

تمام استایل‌های پوسته در `assets/css/main.css` با CSS Custom Properties تعریف شدن.

## رنگ‌ها

### رنگ اصلی
```css
--scarf-color-primary: #d83f5f;
--scarf-color-primary-hover: #c93452;
--scarf-color-primary-soft: #fff1f4;
```
**کجا استفاده:** دکمه‌ها، لینک‌ها، بندها، نشانگر سبد خرید

### رنگ ثانویه
```css
--scarf-color-secondary: #19bfd3;
--scarf-color-secondary-soft: #e9fbfd;
```
**کجا استفاده:** نشانگرهای ویژه، آیکون‌ها

### رنگ‌های وضعیت
```css
--scarf-color-success: #0f9f6e;   /* موفقیت */
--scarf-color-warning: #f59e0b;   /* هشدار */
--scarf-color-danger: #d32f2f;    /* خطر / حذف */
```

### رنگ متن
```css
--scarf-color-text: #232933;       /* متن اصلی */
--scarf-color-text-soft: #5f6773;  /* متن فرعی */
--scarf-color-muted: #8a929f;      /* متن کم‌رنگ */
```

### رنگ پس‌زمینه و سطح
```css
--scarf-color-background: #f6f7f9; /* پس‌زمینه صفحه */
--scarf-color-surface: #ffffff;     /* کارت‌ها و باکس‌ها */
--scarf-color-surface-soft: #fafafa;/* سطح نرم */
--scarf-color-border: #e6e8ec;      /* خطوط جداکننده */
```

### رنگ محصولات
```css
--scarf-color-price: #232933;       /* قیمت */
--scarf-color-discount: #d83f5f;   /* قیمت تخفیف */
```

---

## فونت

```css
--scarf-font-family: Vazirmatn, IRANSans, Tahoma, Arial, sans-serif;
```

### سایزهای فونت
| توکن | مقدار | کجا استفاده |
|------|-------|------------|
| `--scarf-font-xs` | 0.75rem (12px) | متن‌های ریز |
| `--scarf-font-sm` | 0.8125rem (13px) | منو، تگ‌ها |
| `--scarf-font-md` | 0.875rem (14px) | متن معمولی |
| `--scarf-font-base` | 1rem (16px) | پیش‌فرض |
| `--scarf-font-lg` | 1.125rem (18px) | زیرعنوان |
| `--scarf-font-xl` | 1.375rem (22px) | عنوان کارت |
| `--scarf-font-2xl` | 1.75rem (28px) | عنوان بخش |

---

## فاصله‌ها

| توکن | مقدار |
|------|-------|
| `--scarf-space-1` | 0.25rem (4px) |
| `--scarf-space-2` | 0.5rem (8px) |
| `--scarf-space-3` | 0.75rem (12px) |
| `--scarf-space-4` | 1rem (16px) |
| `--scarf-space-5` | 1.25rem (20px) |
| `--scarf-space-6` | 1.5rem (24px) |
| `--scarf-space-8` | 2rem (32px) |
| `--scarf-space-10` | 2.5rem (40px) |
| `--scarf-space-12` | 3rem (48px) |

---

## گوشه‌ها (Border Radius)

| توکن | مقدار | کجا استفاده |
|------|-------|------------|
| `--scarf-radius-xs` | 0.25rem | آیکون‌های کوچک |
| `--scarf-radius-sm` | 0.5rem | دکمه‌های کوچک |
| `--scarf-radius-md` | 0.75rem | کارت‌ها |
| `--scarf-radius-lg` | 1rem | فرم جستجو، تصاویر |
| `--scarf-radius-xl` | 1.25rem | باکس‌های بزرگ |
| `--scarf-radius-pill` | 999px | دکمه‌های کپسولی، badge ها |

---

## سایه‌ها

| توکن | مقدار | کجا استفاده |
|------|-------|------------|
| `--scarf-shadow-sm` | 0 1px 2px rgba(15,23,42,0.06) | کارت‌های معمولی |
| `--scarf-shadow-md` | 0 8px 20px rgba(15,23,42,0.08) | منوی موبایل، دراپ‌داون |
| `--scarf-shadow-lg` | 0 16px 32px rgba(15,23,42,0.10) | مُدال‌ها |

---

## بریک‌پوینت‌ها

| بریک‌پوینت | عرض | کجا اعمال میشه |
|-----------|-----|--------------|
| موبایل | ≤ 768px | چیدمان تک‌ستونه |
| تبلت | ≤ 1024px | منوی همبرگری |
| دسکتاپ | > 1024px | چیدمان کامل |

---

## نحوه تغییر ظاهر

### تغییر رنگ اصلی
```css
:root {
    --scarf-color-primary: #2563eb; /* مثال: آبی */
}
```
این تغییر روی تمام دکمه‌ها، لینک‌ها و بندها اعمال میشه.

### تغییر فونت
```css
:root {
    --scarf-font-family: IRANSansX, Tahoma, sans-serif;
}
```

### تغییر حداکثر عرض سایت
```css
:root {
    --scarf-container-max: 1200px; /* از 1440 به 1200 */
}
```

---

## فایل‌های CSS

| فایل | توضیح |
|------|-------|
| `assets/css/main.css` | کل CSS سایت + توکن‌ها |
| `assets/css/woocommerce.css` | استایل‌های اختصاصی صفحه فروشگاه |
| `assets/css/ultimate-member.css` | استایل‌های افزونه Ultimate Member |
