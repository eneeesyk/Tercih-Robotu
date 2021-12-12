import pyexcel as pe

import  xlsxwriter as xw
import openpyxl

import excel_writer

import pandas as pd
ROW = 22

FACULTY_LIST = []
UNIVERSITY_LIST = []
PROGRAM_CODE = []
PROGRAM_NAME = []
TABAN_PUANI = []
BIRINCI_KONT = []
KONTENJAN = []
BASARI_SIRASI = []
PUAN_TURU = []
OGR_SURE = []
DESC = []


def has_numbers(inputString):
    return any(char.isdigit() for char in inputString)


filename = "2021_4.xls"

records = pe.get_array(file_name=filename)

for i in range(len(records)):
    if len(records[i][0]) == 0:
        if "Fakülte" in records[i][1]:
            if not records[i][1] in FACULTY_LIST:
                FACULTY_LIST.append(records[i][1])  # ünik yapıyor
        elif "Üniversite" in records[i][1]:
            if not records[i][1] in UNIVERSITY_LIST:
                UNIVERSITY_LIST.append(records[i][1])  # ünik yapıyor
    else:
        OGR_SURE.append(records[i][2])
        PUAN_TURU.append(records[i][3])
        KONTENJAN.append(records[i][4])
        BIRINCI_KONT.append(records[i][5])
        DESC.append(records[i][6])
        BASARI_SIRASI.append(records[i][8])
        TABAN_PUANI.append(records[i][9])

OGR_SURE = [int(i) for i in OGR_SURE[2:]]
PUAN_TURU = PUAN_TURU[2:]
KONTENJAN = [int(i) for i in OGR_SURE[2:]]
BIRINCI_KONT = [int(i) for i in OGR_SURE[2:]]
DESC = DESC[2:]
BASARI_SIRASI = [int(i) for i in OGR_SURE[2:]]
TABAN_PUANI = [float(i) for i in OGR_SURE[2:]]

print(type(TABAN_PUANI[0]))

excel_writer.excel_write("university.xls", UNIVERSITY_LIST, title="uni_id", title2="uni_name")
excel_writer.excel_write("faculty_name.xls", FACULTY_LIST, title="faculty_name_id", title2="faculty_name")
#excel_writer.excel_write_fk("faculty.xls", id, id2, title="faculty_id", title2="uni_id")


deneme1=openpyxl.load_workbook("deneme1.xlsx")
deneme2=openpyxl.load_workbook("deneme2.xlsx")

deneme1_sheet=deneme1['Sayfa1']
deneme2_sheet=deneme2['Sayfa1']

for i in deneme1_sheet.iter_rows():
    uni_name=i[0].value
    fac_name=i[1].value
    row_number=i[0].row
    row_number2=i[1].row

    for j in deneme2_sheet.iter_rows():
        if j[0].value== uni_name:
            deneme1_sheet.cell(row=row_number,column=3).value=j[1].value
            #print(j[1].value)
        #ELIF KULLANINCA OLMUYOR
        #elif j[2].value==fac_name:
        #    deneme1_sheet.cell(row=row_number, column=4).value = j[3].value
    for j in deneme2_sheet.iter_rows():
        if j[2].value==fac_name:
            deneme1_sheet.cell(row=row_number, column=4).value = j[3].value
deneme1.save("deneme3.xlsx")
#worksheet.write_formula('A2','=VLOOKUP("İstanbul Medipol Üni ","H1:I1",2,FALSE')
##ws['A2']="=VLOOKUP(C2;H:I;2;0)"
#ws['A2']="=SUM(I2:I225)"


##wb.save("exel.xlsx")
# TODO EXCELI YAZ
