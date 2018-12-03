Document for IoTcube API
========================
This document is an outline and usage document of "IoTcube API". This document is an early version and describes the APIs that deal with the "Vulnerable Code Clone Detection" functionality of "Whitebox Testing" in IoTcube.

Getting Started with API
------------------------
Currently, the initial version of IoTcube API can receive vulnerability information in software by sending ".hidx file" (generated through *hmark*, <https://github.com/iotcube/hmark>) through **POST** method to our API address.

**Address to send POST request**
>**https://<span></span>iotcube.net/api/wf1**

**Params**
* ***files***: the **path** and **contents** of the ".hidx file" (which you want to check for vulnerabilities).
* ***headers***: your **user-agent** value

**Return Field Definitions**
+ **Common value**
   + **total_cve** - Total number of detected CVEs.
   + **total_vulfunc** - Total number of detected vulnerable functions.
   + **file_count** - Total number of files in uploaded '.hidx file'.
   + **func_count** - Total number of functions in uploaded '.hidx file'.
   + **line_count** - Total number of lines in uploaded '.hidx file'.
   
+ **Vulnerability exists**
   + **cveid** - The CVE value of the vulnerability.
   + **cwe** - The CWE value of the vulnerability.
   + **cvss** - The CVSS value of the vulnerability.
   + **file** - The file path where the vulnerability exists.
   + **funcid** - The function number in the file (*See hmark*).
   + **diff** - All commit information for this vulnerability.
   + **patch** - Patch information of the vulnerable code (*'Dec. 2018 ADDED by Seunghoon Woo'*).
  
Result (JSON)
-------------
(*'Dec. 2018 MODIFIED by Seunghoon Woo'* - ADDED "patch").
```
[
  {
    "total_cve"    : 5,
    "total_vulfunc": 6, 
    "file_count"   : 100,
    "func_count"   : 1000,
    "line_count"   : 10000,
  }, 
  {
    "cveid" : "CVE-2018-0000",
    "cwe"   : "CWE-119",
    "cvss"  : "10.0", 
    "file"  : "Path/to/file",
    "funcid": "5",
    "diff"  : "https://iotcube.net/whitebox/diff/.../CVE-2018-0000_....diff", 
    "patch" : "https://iotcube.net/whitebox/diff/.../CVE-2018-0000_....patch" 
  }, … ,
  {
    … 
  }
] 
```
Sample codes
------------
See *'example'* directory.

About
-----
This document and code is authored and maintained by Seunghoon Woo.
>seunghoonwoo@<span></span>korea.ac.kr
