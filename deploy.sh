#!/bin/bash

# Konfigurasi
DEPLOY_DIR="../deploy_rumahweb"  # Folder deployment di luar root project
LARAVEL_DIR="laravel"

# Hapus folder deploy lama (jika ada)
rm -rf $DEPLOY_DIR

# Langkah 1: Build Asset Production
echo "Step 1/11: Building production assets..."
npm run build

# Langkah 2: Buat folder deployment
echo "Step 2/11: Creating deployment directory..."
mkdir -p $DEPLOY_DIR

# Langkah 3: Salin file ke folder deployment
echo "Step 3/11: Copying project files..."
rsync -a --exclude='vendor/' --exclude='node_modules/' --exclude='deploy_rumahweb/' ./ $DEPLOY_DIR/

# Langkah 4: Pindah ke folder deployment
echo "Step 4/11: Entering deployment directory..."
cd $DEPLOY_DIR

# Langkah 5: Buat folder laravel dan pindahkan file
echo "Step 5/11: Organizing Laravel core files..."
mkdir $LARAVEL_DIR
shopt -s extglob
mv !(public|$LARAVEL_DIR) $LARAVEL_DIR/

# Langkah 6: Ubah nama folder public menjadi public_html
echo "Step 6/11: Renaming public directory..."
mv public public_html

# Langkah 7 & 8: Buat struktur public di dalam laravel
echo "Step 7-8/11: Creating new public structure..."
mkdir -p $LARAVEL_DIR/public/build

# Langkah 9: Pindahkan manifest.json
echo "Step 9/11: Moving manifest file..."
mv public_html/build/manifest.json $LARAVEL_DIR/public/build/

# Langkah 10: Update index.php (Agar kompatibel dengan Linux/macOS/Windows)
echo "Step 10/11: Modifying index.php with OS compatibility..."

# Deteksi OS
OS_TYPE=$(uname)

# Gunakan sed yang sesuai dengan OS
if [[ "$OS_TYPE" == "Darwin" ]]; then
  SED_CMD="sed -i ''"
elif [[ "$OS_TYPE" == "Linux" || "$OS_TYPE" == "MINGW"* || "$OS_TYPE" == "MSYS"* ]]; then
  SED_CMD="sed -i"
else
  echo "Unsupported OS: $OS_TYPE"
  exit 1
fi

# Pastikan index.php ada sebelum mengubahnya
if [[ -f "public_html/index.php" ]]; then
  $SED_CMD -e "34s|../vendor|../laravel/vendor|" -e "47s|../bootstrap|../laravel/bootstrap|" public_html/index.php
else
  echo "Error: public_html/index.php not found!"
  exit 1
fi

# Binding path public (tambahkan newline sebelum kode)
printf "\n\$app->bind('path.public', function() {\n    return __DIR__;\n});" >> public_html/index.php

# Set permissions
chmod -R 755 $LARAVEL_DIR/storage
chmod -R 755 $LARAVEL_DIR/bootstrap/cache

# Langkah 11: Kompresi folder (di dalam deploy_rumahweb)
echo "Step 11/11: Compressing inside deploy_rumahweb..."
zip -r deployment_package.zip laravel public_html

# Kembali ke direktori awal
cd ..

echo "Deployment package ready in $DEPLOY_DIR!"
