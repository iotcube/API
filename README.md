# Document for IoTcube API
This document is an outline and usage document of "IoTcube API". This document is an early version and describes the APIs that deal with the "Vulnerable Code Clone Detection" functionality of "Whitebox Testing" in IoTcube.

## Getting Started with API
Currently, the initial version of IoTcube API can receive vulnerability information in software by sending ".hidx file" (generated through *hmark*, <https://github.com/iotcube/hmark>) through **POST** method to our API address.

### whitebox
---
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
  
### blackbox
---
**Address to send POST request**
>**https://<span></span>iotcube.net/api/bf2**

**Params**
* ***files***: the **path** and **contents** of the ".zip file" (result bundle file).
* ***headers***: your **user-agent** value

**Return Field Definitions**
   + **Version** - Version of tool.
   + **Elapsed_Time** - Total tested hours
   + **Target_Binary** - Targeted binary by tool.
   + **Trials** - Total number of counts tool tested binary.
   + **Crashes** - Total number of crashes detected.
   + **Initial_Crashes** - Total number of crashes detected by original seed.
   
## Result (JSON)

### whitebox
---
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
### blackbox
---
```
{
	"Version"        : "1.0.0",
	"Elapsed_Time"   : "272",
	"Target_Binary"  : "gif2png @@",
	"Trials"         : "9563",
	"Crashes"        : 
	[
		{ 
		   "no"        : "1", 
		   "URI"       : "2019-09-16-18:29:22_0x605cadf1_CVE-2011-2131_photoshop", 
		   "Origin_PoC":"CVE-2011-2131" 
		}
	],
	"Initial_Crashes": [

	]
}
```
Sample codes
------------
See *'example'* directory.

About
-----
This document and code is authored and maintained by Seunghoon Woo (Whitebox) and Gangmo Seong (Blackbox).
>seunghoonwoo@<span></span>korea.ac.kr

>geldkang@<span></span>naver.com
