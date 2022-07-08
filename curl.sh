# sample cURL command for communicating with SOAP API
curl -X GET https://ws.registrucentras.lt:443/broker/index.php \
-H "Content-Type: application/soap+xml; charset=utf-8; action=\"urn:http://www.registrucentras.lt#get\"" \
-d '<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                  xmlns:xsd="http://www.w3.org/2001/XMLSchema"
                  xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"
                  xmlns:reg="urn:http://www.registrucentras.lt">
    <soapenv:Header/>
    <soapenv:Body>
        <reg:GetData soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
            <input xsi:type="reg:InputParams" xmlns:reg="http://www.registrucentras.lt">
                <ActionType xsi:type="xsd:string">6</ActionType>
                <Parameters xsi:type="xsd:string"><![CDATA[<?xml version="1.0"
encoding="UTF-8" standalone="yes"?>
<args><kodas>124110246</kodas><fmt>pdf</fmt></args>]]></Parameters>
                <EndUserInfo xsi:type="xsd:string"><![CDATA[<?xml version="1.0"
encoding="UTF-8" standalone="yes"?>
<user><asm_kodas>37101010101</asm_kodas><vaidmuo>vasu</
vaidmuo><id>12687</id>
</user>]]></EndUserInfo>
                <CallerCode xsi:type="xsd:string">gavejas</CallerCode>
                <Time xsi:type="xsd:string">2018-06-27 10:03:00</Time>
                <Signature xsi:type="xsd:string">
                    xgZ4RQ1HRmUF/DFWNIK5ocWrAuuc/PGPYY/z97r6eQX78HRhHevmkppSbQPSgA3PzKKu
                    GQckeHu2Ha3n8tBMk8d4ZgHKcC2mJ9VX79pX+lqHmjQPJDyxP7sBsivY2XFn7MPmnMA7
                    oSlJQSo/4q9lg5VI6K2Tijnn2BsJIHuqeg8=</Signature>
            </input>
        </reg:GetData>
    </soapenv:Body>
</soapenv:Envelope>'
