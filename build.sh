# theme
sass -t compressed platform/wp-content/themes/gmss/gmss.scss platform/wp-content/themes/gmss/gmss.css
rm -f platform/wp-content/themes/gmss/gmss.css.gz
gzip -k9 platform/wp-content/themes/gmss/gmss.css
uglifyjs -cm -o platform/wp-content/themes/gmss/home-cards.min.js -- platform/wp-content/themes/gmss/home-cards.js

# mudguard.js
uglifyjs -cm -o platform/wp-content/themes/gmss/mudguard.min.js -- platform/wp-content/themes/gmss/mudguard/mudguard.js
uglifyjs -cm -o platform/wp-content/themes/gmss/kickstand.min.js -- platform/wp-content/themes/gmss/mudguard/kickstand.js
# minify css
mv platform/wp-content/themes/gmss/mudguard/mudguard.css platform/wp-content/themes/gmss/mudguard/mudguard.scss
sass -t compressed platform/wp-content/themes/gmss/mudguard/mudguard.scss platform/wp-content/themes/gmss/mudguard.min.css
rm -f platform/wp-content/themes/gmss/mudguard.min.css.gz
gzip -k9 platform/wp-content/themes/gmss/mudguard.min.css
mv platform/wp-content/themes/gmss/mudguard/mudguard.scss platform/wp-content/themes/gmss/mudguard/mudguard.css

# phidias.js
uglifyjs -c -m -o platform/wp-content/themes/gmss/phidias.min.js -- platform/wp-content/themes/gmss/phidias/phidias.js
