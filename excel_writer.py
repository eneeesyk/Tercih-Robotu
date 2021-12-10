# import xlsxwriter module
import xlsxwriter


def generate_id(lst):
    l = []
    for i in range(len(lst)):
        l.append(str(i + 1))
    return l


def excel_write(filename, content, **kwargs):
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

    id = generate_id(content)

    # ID
    for i in id:
        worksheet.write(row, 0, i)
        row += 1

    # TITLE
    for i in v:
        worksheet.write(0, column, i)
        column += 1

    row = 1
    column = 1
    # iterating through content list
    # ÜNİVERSİTE İSİMLERİ
    for item in content:
        # write operation perform
        worksheet.write(row, column, item)

        # incrementing the value of row by one
        # with each iterations.
        row += 1

    workbook.close()

def excel_write_fk(filename, id, id2,**kwargs):
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
