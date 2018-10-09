#ifndef EDITWINDOW2_H
#define EDITWINDOW2_H

#include <QWidget>
#include "rents.h"

namespace Ui {
class EditWindow2;
}

class EditWindow2 : public QWidget
{
    Q_OBJECT

public:
    explicit EditWindow2(QWidget *parent = 0);
    explicit EditWindow2(const int &tempeID, QSqlDatabase &db);
    ~EditWindow2();

private slots:
    void on_lineEditeID_textChanged(const QString &arg1);

    void on_lineEditFirstName_textChanged(const QString &arg1);

    void on_lineEditSecondName_textChanged(const QString &arg1);

    void on_lineEditMiddleName_textChanged(const QString &arg1);

    void on_lineEditLastName_textChanged(const QString &arg1);

    void on_lineEditHomeAddress_textChanged(const QString &arg1);

    void on_lineEditSchool_textChanged(const QString &arg1);

    void on_lineEditCourse_textChanged(const QString &arg1);

    void on_lineEditBalance_textChanged(const QString &arg1);

    void on_pushButtonSave_clicked();

    void on_pushButtonCancel_clicked();


private:
    Ui::EditWindow2 *ui;
    int eID;
    QString FirstName;
    QString SecondName;
    QString MiddleName;
    QString LastName;
    QString HomeAddress;
    QString School;
    QString Course;
    int Balance;
    QSqlQuery *query;
};

#endif // EDITWINDOW2_H
