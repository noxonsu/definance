Обновление vendor

1. Клонируем в отдельную папку https://github.com/noxonsu/unifactory
```
git clone https://github.com/noxonsu/unifactory
```
2. Устанавливаем зависимости
```
cd unifactory
npm i
```
3. Делаем чистый билд
```
npm run build_clean
```

4. Удалить содержимое папки
```
definance\vendor_source
```
5. Скопировать свежий билд из ```unifactory\build``` в ```definance\vendor_source```
6. Увеличить версию в файле ```definance\definance.php```
