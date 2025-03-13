#!/bin/bash

# Konfigurasi
DEPLOY_DIR="../deploy_rumahweb"  # Folder deployment di luar root project
LARAVEL_DIR="laravel"

# Hapus folder deploy lama (jika ada)
rm -rf $DEPLOY_DIR

# Langkah 1: Build Asset Production
echo "Step 1/10: Building production assets..."
npm run build

# Langkah 2: Buat folder deployment
echo "Step 2/10: Creating deployment directory..."
mkdir -p $DEPLOY_DIR

# Langkah 3: Salin file ke folder deployment
echo "Step 3/10: Copying project files..."
rsync -a --exclude='vendor/' --exclude='node_modules/' --exclude='deploy_rumahweb/' ./ $DEPLOY_DIR/

# Langkah 4: Pindah ke folder deployment
echo "Step 4/10: Entering deployment directory..."
cd $DEPLOY_DIR

# Langkah 5: Buat folder laravel dan pindahkan file
echo "Step 5/10: Organizing Laravel core files..."
mkdir $LARAVEL_DIR
shopt -s extglob
mv !(public|$LARAVEL_DIR) $LARAVEL_DIR/

# Langkah 6: Ubah nama folder public menjadi public_html
echo "Step 6/10: Renaming public directory..."
mv public public_html

# Langkah 7 & 8: Buat struktur public di dalam laravel
echo "Step 7-8/10: Creating new public structure..."
mkdir -p $LARAVEL_DIR/public/build

# Langkah 9: Pindahkan manifest.json
echo "Step 9/10: Moving manifest file..."
mv public_html/build/manifest.json $LARAVEL_DIR/public/build/

# Langkah 10: Update index.php
echo "Step 10/10: Modifying index.php..."
sed -i \
  -e "s/__DIR__.'\/..\/vendor/__DIR__.'\/..\/$LARAVEL_DIR\/vendor/g" \
  -e "s/__DIR__.'\/..\/bootstrap/__DIR__.'\/..\/$LARAVEL_DIR\/bootstrap/g" \
  public_html/index.php

# Tambahkan binding path public
echo -e "\n\$app->bind('path.public', function() {\n    return __DIR__;\n});" >> public_html/index.php

# Set permissions
chmod -R 755 $LARAVEL_DIR/storage
chmod -R 755 $LARAVEL_DIR/bootstrap/cache

# Kembali ke direktori awal
cd ..

echo "Deployment package ready in ../deploy_rumahweb!"