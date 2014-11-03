#!/bin/bash
# snmp printer status
# Version 1.0
# DMSD.DK / Fyns Kontorteknik - Creator
#Function takes two arguments: ip oid
#function snmpget()


	ips=('172.29.8.250' '172.29.8.107')


for ip in ${ips[@]} ; do
serienummer=$(snmpget -v2c -c public $ip iso.3.6.1.2.1.43.5.1.1.17.1 | cut -d" " -f4-) 
model=$(snmpget -v2c -c public $ip iso.3.6.1.2.1.43.5.1.1.16.1 | cut -d" " -f4-)
ialt=$(snmpget -v2c -c public $ip iso.3.6.1.4.1.1347.43.10.1.1.12.1.1 | cut -d" " -f4-)
a3f=$(snmpget -v2c -c public $ip iso.3.6.1.4.1.1347.42.2.1.1.1.8.1.1 | cut -d" " -f4-)
a3sh=$(snmpget -v2c -c public $ip iso.3.6.1.4.1.1347.42.2.1.1.1.7.1.1 | cut -d" " -f4-)
a4sh=$(snmpget -v2c -c public $ip iso.3.6.1.4.1.1347.42.2.1.1.1.7.1.3 | cut -d" " -f4-)
a4f=$(snmpget -v2c -c public $ip iso.3.6.1.4.1.1347.42.2.1.1.1.8.1.3 | cut -d" " -f4-)
hostnavn=$(snmpget -v2c -c public $ip iso.3.6.1.4.1.1347.40.10.1.1.5.1 | cut -d" " -f4-) 
scan=$(snmpget -v2c -c public $ip iso.3.6.1.4.1.1347.46.10.1.1.5.3 | cut -d" " -f4-)

 
mysql --host=localhost --user=root --password=C8chokokiks status_printer -e "INSERT INTO status (serienummer,model,ialt,a3f,a3sh,a4sh,a4f,hostnavn,scan,ip)
 VALUES('${serienummer}','${model}','${ialt}','${a3f}','${a3sh}','${a4sh}','${a4f}','${hostnavn}','${scan}','${ip}');"
done
