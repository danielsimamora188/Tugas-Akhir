AOS.init();

$(document).ready(function() {
    $("#btnExport").click(function(e) {
        e.preventDefault();

        //getting data from our table
        var data_type = 'data:application/vnd.ms-excel';
        var table_div = document.getElementById('table_wrapper');
        var table_html = table_div.outerHTML.replace(/ /g, '%20');

        var a = document.createElement('a');
        a.href = data_type + ', ' + table_html;
        a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
        a.click();
    });

    $("#btnExport2").click(function(e) {
        e.preventDefault();

        //getting data from our table
        var data_type = 'data:application/vnd.ms-excel';
        var table_div = document.getElementById('table_wrapper2');
        var table_html = table_div.outerHTML.replace(/ /g, '%20');

        var a = document.createElement('a');
        a.href = data_type + ', ' + table_html;
        a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
        a.click();
    });

    $("#btnExport3").click(function(e) {
        e.preventDefault();

        //getting data from our table
        var data_type = 'data:application/vnd.ms-excel';
        var table_div = document.getElementById('table_wrapper3');
        var table_html = table_div.outerHTML.replace(/ /g, '%20');

        var a = document.createElement('a');
        a.href = data_type + ', ' + table_html;
        a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
        a.click();
    });
});

function exportHTML(){
    var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
        "xmlns:w='urn:schemas-microsoft-com:office:word' "+
        "xmlns='http://www.w3.org/TR/REC-html40'>"+
        "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
    var footer = "</body></html>";
    var sourceHTML = header+document.getElementById("source-html").innerHTML+footer;
            
    var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
    var fileDownload = document.createElement("a");
    document.body.appendChild(fileDownload);
    fileDownload.href = source;
    fileDownload.download = 'document.doc';
    fileDownload.click();
    document.body.removeChild(fileDownload);
}

            
function exportHTML2(){
    var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
        "xmlns:w='urn:schemas-microsoft-com:office:word' "+
        "xmlns='http://www.w3.org/TR/REC-html40'>"+
        "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
    var footer = "</body></html>";
    var sourceHTML = header+document.getElementById("source-html2").innerHTML+footer;
        
    var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
    var fileDownload = document.createElement("a");
    document.body.appendChild(fileDownload);
    fileDownload.href = source;
    fileDownload.download = 'document.doc';
    fileDownload.click();
    document.body.removeChild(fileDownload);
}

function exportHTML3(){
    var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
        "xmlns:w='urn:schemas-microsoft-com:office:word' "+
        "xmlns='http://www.w3.org/TR/REC-html40'>"+
        "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
    var footer = "</body></html>";
    var sourceHTML = header+document.getElementById("source-html3").innerHTML+footer;
            
    var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
    var fileDownload = document.createElement("a");
    document.body.appendChild(fileDownload);
    fileDownload.href = source;
    fileDownload.download = 'document.doc';
    fileDownload.click();
    document.body.removeChild(fileDownload);
}

function tandaPemisahTitik(b){
    var _minus = false;
    if (b<0) _minus = true;
    b = b.toString();
    b=b.replace(".","");
    b=b.replace("-","");
    c = "";
    panjang = b.length;
    j = 0;
    for (i = panjang; i > 0; i--){
    j = j + 1;
    if (((j % 3) == 1) && (j != 1)){
    c = b.substr(i-1,1) + "." + c;
    } else {
    c = b.substr(i-1,1) + c;
    }
    }
    if (_minus) c = "-" + c ;
    return c;
    }
    
    function numbersonly(ini, e){
    if (e.keyCode>=49){
    if(e.keyCode<=57){
    a = ini.value.toString().replace(".","");
    b = a.replace(/[^\d]/g,"");
    b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
    ini.value = tandaPemisahTitik(b);
    return false;
    }
    else if(e.keyCode<=105){
    if(e.keyCode>=96){
    //e.keycode = e.keycode - 47;
    a = ini.value.toString().replace(".","");
    b = a.replace(/[^\d]/g,"");
    b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
    ini.value = tandaPemisahTitik(b);
    //alert(e.keycode);
    return false;
    }
    else {return false;}
    }
    else {
    return false; }
    }else if (e.keyCode==48){
    a = ini.value.replace(".","") + String.fromCharCode(e.keyCode);
    b = a.replace(/[^\d]/g,"");
    if (parseFloat(b)!=0){
    ini.value = tandaPemisahTitik(b);
    return false;
    } else {
    return false;
    }
    }else if (e.keyCode==95){
    a = ini.value.replace(".","") + String.fromCharCode(e.keyCode-48);
    b = a.replace(/[^\d]/g,"");
    if (parseFloat(b)!=0){
    ini.value = tandaPemisahTitik(b);
    return false;
    } else {
    return false;
    }
    }else if (e.keyCode==8 || e.keycode==46){
    a = ini.value.replace(".","");
    b = a.replace(/[^\d]/g,"");
    b = b.substr(0,b.length -1);
    if (tandaPemisahTitik(b)!=""){
    ini.value = tandaPemisahTitik(b);
    } else {
    ini.value = "";
    }
    
    return false;
    } else if (e.keyCode==9){
    return true;
    } else if (e.keyCode==17){
    return true;
    } else {
    //alert (e.keyCode);
    return false;
    }
    
    }