# import xlsxwriter module
import xlsxwriter
import pandas as pd
import openpyxl

def merge():

    # reading the files
    f1 = pd.read_excel("university.xlsx")
    f2 = pd.read_excel("faculty_name.xlsx")

    # merging the files
    f3 = f1[["uni_name",
             "uni_id"]].merge(f2[["faculty_name", "faculty_name_id"]], right_index=True, left_index=True)

    # creating a new file
    f3.to_excel("uni_fac_id.xlsx", index=False)


def generate_id(lst):
    l = []
    for i in range(len(lst)):
        l.append(str(i + 1))
    return l


def excel_write(filename, content, column_2, **kwargs):
    k = []
    v = []
    for key, value in kwargs.items():
        k.append(key)
        v.append(value)

    print(k)
    print(v)

    workbook = xlsxwriter.Workbook(filename=filename)
    worksheet = workbook.add_worksheet()

    # Start from the first cell.
    # Rows and columns are zero indexed.
    row = 1
    column = 0

    if filename != "uni_faculty_name.xlsx":
        id = generate_id(content)

        # ID
        for i in id:
            worksheet.write(row, column, i)
            row += 1

    row = 1
    # TITLE
    for i in v:
        if type(i) == list:
            for n in i:
                worksheet.write(row, column_2, n)
                row += 1

        else:
            worksheet.write(0, column_2, i)
            column_2 += 1

    row = 1
    if filename != "uni_faculty_name.xlsx":
        column = 1
    else:
        column = 0
    # iterating through content list
    # ÜNİVERSİTE İSİMLERİ
    for item in content:
        # write operation perform
        worksheet.write(row, column, item)

        # incrementing the value of row by one
        # with each iterations.
        row += 1

    workbook.close()


def excel_write_fk(filename, **kwargs):
    k = []
    v = []
    for key, value in kwargs.items():
        k.append(key)
        v.append(value)

    print(k)
    print(v)

    workbook = xlsxwriter.Workbook(filename=filename)
    worksheet = workbook.add_worksheet()

    # Start from the first cell.
    # Rows and columns are zero indexed.
    row = 1
    column = 0

    id = generate_id(main.UNIVERSITY_LIST)

    # ID
    for i in id:
        worksheet.write(row, 0, i)
        row += 1

    # TITLE
    for i in v:
        worksheet.write(0, column, i)
        column += 1

    workbook.close()