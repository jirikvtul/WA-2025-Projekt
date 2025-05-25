# Bootstrap Cheatsheet

## Grid System
- `container` - Základní kontejner s responzivní šířkou
- `container-fluid` - Kontejner na celou šířku obrazovky
- `row` - Řádek pro grid systém
- `col-*` - Sloupce (např. `col-md-6` pro střední obrazovky)
- `col-auto` - Automatická šířka sloupce podle obsahu

## Spacing
- `m-*` - Margin (vnější odsazení)
  - `m-0` až `m-5` - Velikost odsazení
  - `mt-*` - Margin top
  - `mb-*` - Margin bottom
  - `ms-*` - Margin start (vlevo)
  - `me-*` - Margin end (vpravo)
- `p-*` - Padding (vnitřní odsazení)
  - `p-0` až `p-5` - Velikost odsazení
  - `pt-*` - Padding top
  - `pb-*` - Padding bottom
  - `ps-*` - Padding start
  - `pe-*` - Padding end

## Flexbox
- `d-flex` - Zobrazení jako flexbox
- `flex-row` - Horizontální uspořádání
- `flex-column` - Vertikální uspořádání
- `justify-content-*` - Zarovnání na hlavní ose
  - `justify-content-start`
  - `justify-content-center`
  - `justify-content-end`
  - `justify-content-between`
  - `justify-content-around`
- `align-items-*` - Zarovnání na vedlejší ose
  - `align-items-start`
  - `align-items-center`
  - `align-items-end`

## Typography
- `text-*` - Zarovnání textu
  - `text-start`
  - `text-center`
  - `text-end`
- `text-*` - Barva textu
  - `text-primary`
  - `text-secondary`
  - `text-success`
  - `text-danger`
  - `text-warning`
  - `text-info`
- `fw-*` - Tloušťka písma
  - `fw-bold`
  - `fw-normal`
  - `fw-light`
- `lead` - Větší a světlejší text pro zvýraznění odstavců
- `fs-*` - Velikost písma
  - `fs-1` až `fs-6` - Od největší (1) po nejmenší (6)
  - `fs-4` - Střední velikost písma

## Background
- `bg-*` - Barva pozadí
  - `bg-primary`
  - `bg-secondary`
  - `bg-success`
  - `bg-danger`
  - `bg-warning`
  - `bg-info`
  - `bg-light`
  - `bg-dark`

## Borders
- `border` - Přidání ohraničení
- `border-*` - Barva ohraničení
  - `border-primary`
  - `border-secondary`
  - `border-success`
  - `border-danger`
- `rounded` - Zaoblené rohy
- `rounded-circle` - Kruhové zaoblení

## Buttons
- `btn` - Základní třída pro tlačítka
- `btn-*` - Styl tlačítka
  - `btn-primary`
  - `btn-secondary`
  - `btn-success`
  - `btn-danger`
  - `btn-warning`
  - `btn-info`
- `btn-outline-*` - Obrysové tlačítko
- `btn-sm` - Malé tlačítko
- `btn-lg` - Velké tlačítko

## Cards
- `card` - Základní kontejner karty
- `card-header` - Hlavička karty
- `card-body` - Tělo karty
- `card-footer` - Patička karty
- `card-title` - Nadpis karty
- `card-text` - Text karty

## Forms
- `form-control` - Základní styl pro input
- `form-label` - Styl pro label
- `form-text` - Pomocný text
- `form-check` - Checkbox/Radio kontejner
- `form-check-input` - Checkbox/Radio input
- `form-check-label` - Checkbox/Radio label

## Utilities
- `shadow` - Přidání stínu
- `shadow-sm` - Malý stín
- `shadow-lg` - Velký stín
- `w-*` - Šířka
  - `w-25`
  - `w-50`
  - `w-75`
  - `w-100`
- `h-*` - Výška
  - `h-25`
  - `h-50`
  - `h-75`
  - `h-100`

## Display
- `d-none` - Skrytí elementu
- `d-block` - Zobrazení jako blok
- `d-inline` - Zobrazení inline
- `d-inline-block` - Zobrazení inline-block
- `d-flex` - Zobrazení jako flexbox
- `d-grid` - Zobrazení jako grid

## Position
- `position-relative` - Relativní pozicování
- `position-absolute` - Absolutní pozicování
- `position-fixed` - Fixní pozicování
- `position-sticky` - Sticky pozicování

## Responsive
- `d-{breakpoint}-none` - Skrytí na breakpointu
- `d-{breakpoint}-block` - Zobrazení na breakpointu
- Breakpointy:
  - `sm` - ≥576px
  - `md` - ≥768px
  - `lg` - ≥992px
  - `xl` - ≥1200px
  - `xxl` - ≥1400px 