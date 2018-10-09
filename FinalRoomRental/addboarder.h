#ifndef ADDBOARDER_H
#define ADDBOARDER_H

#include <QWidget>
#include "rents.h"
#include <QApplication>
#include <QHBoxLayout>
#include <QDateEdit>
#include <QLineEdit>
#include <QMessageBox>

namespace Ui {
class AddBoarder;
}

class AddBoarder : public QWidget
{
    Q_OBJECT

public:
    explicit AddBoarder(QWidget *parent = 0);
    ~AddBoarder();
    QDateEdit *dateEdit;
    QLineEdit *lineEdit;
    void loadDatabase();

private slots:
//    void on_lineEditeID_textChanged(const QString &arg1);

    void on_dateEdit_dateChanged(const QDate &date);

    void on_comboBox_currentTextChanged(const QString &arg1);

    void on_lineEditFirstName_textChanged(const QString &arg1);

    void on_lineEditSecondName_textChanged(const QString &arg1);

    void on_lineEditMiddleName_textChanged(const QString &arg1);

    void on_lineEditLastName_textChanged(const QString &arg1);

    void on_lineEditHomeAddress_textChanged(const QString &arg1);

    void on_lineEditSchool_textChanged(const QString &arg1);

    void on_lineEditCourse_textChanged(const QString &arg1);

    void on_lineEditBalance_textChanged(const QString &arg1);

    void on_pushButtonAddBoarder_clicked();

    void on_pushButtonCancel_clicked();


private:
    Ui::AddBoarder *ui;
    int eID;
    QString DateEntered;
    int RoomNumber;
    QString Gender;
    QString FirstName;
    QString SecondName;
    QString MiddleName;
    QString LastName;
    QString HomeAddress;
    QString School;
    QString Course;
    int Balance;
    QString Username;
    QString Password;
};

#endif // ADDBOARDER_H
