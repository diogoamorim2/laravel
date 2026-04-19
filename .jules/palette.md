## 2024-04-19 - Floating Action Button Focus Rings
**Learning:** Default square focus rings on circular floating action buttons (like WhatsApp or back-to-top) look broken and confusing. Browsers often fail to adapt the focus ring to the element's actual shape, even with border-radius.
**Action:** Always explicitly define `:focus-visible` with `border-radius: 50%` and an appropriate `outline-offset` for circular buttons to ensure keyboard accessibility looks intentional and polished.
