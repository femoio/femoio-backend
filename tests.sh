#!/usr/bin/env bash

/usr/bin/php -S localhost:8000 -t /home/felix/PhpstormProjects/femoio-backend&

curl http://localhost:8000/ > /dev/null

sleep 1

pid=$!

echo -n "[TEST] Angabe der Seiten "

content=`curl http://localhost:8080/pages/ 2> /dev/null`
expect='[{"id":"index","title":{"de":"FeMo IO Startseite","en":"FeMo IO Homepage"}},{"id":"about","title":{"de":"FeMo IO Über","en":"FeMo IO About"}}]'
if [ ! $? -eq 0 ]; then
    echo [FAIL] \(HTTP\)
else
if [ "${content}" = "${expect}" ]; then
    echo [ OK ]
else
    echo [FAIL]
    echo Expected: "${expect}"
    echo Got: "${content}"
fi
fi

kill ${pid}