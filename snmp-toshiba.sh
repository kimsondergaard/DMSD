#!/bin/bash
# snmp printer status

#Function takes two arguments: ip oid
#function snmpget()
#{
#    snmpdata=`snmpget -v2c -c public $1 $2 | cut -d" " -f3-`
#    echo $snmpdata
#}

	ips=('172.29.8.103' '172.29.8.115')

for ip in ${ips[@]} ; do
netstat -tupln | grep $ip:80
serienummer=$(snmpget -v2c -c public $ip .1.3.6.1.2.1.43.5.1.1.17.1 | cut -d" " -f4-) 
model=$(snmpget -v2c -c public $ip .1.3.6.1.4.1.1129.2.3.50.1.2.3.1.3.1.1 | cut -d" " -f4-)
ialt=$(snmpget -v2c -c public $ip iso.1.3.6.1.2.1.43.10.2.1.4.1.1 | cut -d" " -f4-)

a3f=$(snmpget -v2c -c public $ip .1.3.6.1.4.1.1129.2.3.50.1.3.21.6.1.211.1.1 | cut -d" " -f4-)
a3sh=$(snmpget -v2c -c public $ip .1.3.6.1.4.1.1129.2.3.50.1.3.21.6.1.211.1.3 | cut -d" " -f4-)
a4sh=$(snmpget -v2c -c public $ip .1.3.6.1.4.1.1129.2.3.50.1.3.21.6.1.57.1.3 | cut -d" " -f4-)
a4f=$(snmpget -v2c -c public $ip .1.3.6.1.4.1.1129.2.3.50.1.3.21.6.1.212.1.1 | cut -d" " -f4-)

hostnavn=$(snmpget -v2c -c public $ip .1.3.6.1.2.1.43.5.1.1.16.1 | cut -d" " -f4-) 
scanfkopi=$(snmpget -v2c -c public $ip .1.3.6.1.4.1.1129.2.3.50.1.3.21.6.1.9.1.1 | cut -d" " -f4-)
scanskopi=$(snmpget -v2c -c public $ip .1.3.6.1.4.1.1129.2.3.50.1.3.21.6.1.9.1.3 | cut -d" " -f4-)
scanfnet=$(snmpget -v2c -c public $ip .1.3.6.1.4.1.1129.2.3.50.1.3.21.6.1.8.1.1 | cut -d" " -f4-)
scansnet=$(snmpget -v2c -c public $ip .1.3.6.1.4.1.1129.2.3.50.1.3.21.6.1.8.1.3 | cut -d" " -f4-)

 
mysql --host=localhost --user=root --password=C8chokokiks status_printer -e "INSERT INTO status (serienummer,model,ialt,a3f,a3sh,a4sh,a4f,hostnavn,scanfkopi,scanskopi,scanfnet,scansnet)
 VALUES('${serienummer}','${model}','${ialt}','${a3f}','${a3sh}','${a4sh}','${a4f}','${hostnavn}','${scanfkopi}','${scanskopi}','$scanfnet}','${scansnet}');"
done