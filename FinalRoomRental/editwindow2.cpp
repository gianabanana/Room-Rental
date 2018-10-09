#include "editwindow2.h"
#include "ui_editwindow2.h"
#include "rents.h"

EditWindow2::EditWindow2(QWidget *parent) :
    QWidget(parent),
    ui(new Ui::EditWindow2)
{
    ui->setupUi(this);
}

EditWindow2::~EditWindow2()
{
    delete ui;
}

EditWindow2::EditWindow2(const int &tempeID, QSqlDatabase &db) :
    ui(new Ui::EditWindow2)
{
    ui->setupUi(this);
    eID=tempeID;
    query=new QSqlQuery(db);
    query->prepare("SELECT *FROM addboarder WHERE eID=:eID");
    query->bindValue(":eID", eID);
    if(query->exec()){
        while(query->next()){
            ui->lineEditFirstName->setText(query->value(4).toString());
            ui->lineEditSecondName->setText(query->value(5).toString());
            ui->lineEditMiddleName->setText(query->value(6).toString());
            ui->lineEditLastName->setText(query->value(7).toString());
            ui->lineEditHomeAddress->setText(query->value(8).toString());
            ui->lineEditSchool->setText(query->value(9).toString());
            ui->lineEditCourse->setText(query->value(10).toString());
            ui->lineEditBalance->setText(query->value(11).toString());
        }
    }
}

void EditWindow2::on_lineEditeID_textChanged(const QString &arg1)
{
    QString iD=arg1;
    eID=iD.toInt();
    qDebug()<<eID;
}

void EditWindow2::on_lineEditFirstName_textChanged(const QString &arg1)
{
    FirstName=arg1;
    qDebug()<<FirstName;
}

void EditWindow2::on_lineEditSecondName_textChanged(const QString &arg1)
{
    SecondName=arg1;
    qDebug()<<SecondName;
}

void EditWindow2::on_lineEditMiddleName_textChanged(const QString &arg1)
{
    MiddleName=arg1;
    qDebug()<<MiddleName;
}

void EditWindow2::on_lineEditLastName_textChanged(const QString &arg1)
{
    LastName=arg1;
    qDebug()<<LastName;
}

void EditWindow2::on_lineEditHomeAddress_textChanged(const QString &arg1)
{
    HomeAddress=arg1;
    qDebug()<<HomeAddress;
}

void EditWindow2::on_lineEditSchool_textChanged(const QString &arg1)
{
    School=arg1;
    qDebug()<<School;
}

void EditWindow2::on_lineEditCourse_textChanged(const QString &arg1)
{
    Course=arg1;
    qDebug()<<Course;
}

void EditWindow2::on_lineEditBalance_textChanged(const QString &arg1)
{
    QString bal=arg1;
    Balance=bal.toInt();
    qDebug()<<Balance;
}

void EditWindow2::on_pushButtonSave_clicked()
{
    QSqlQuery query;
      query.prepare("UPDATE `database`.addboarder set eID=:eID, FirstName=:FirstName, SecondName=:SecondName, MiddleName=:MiddleName, LastName=:LastName, HomeAddress=:HomeAddress, School=:School, Course=:Course, Balance=:Balance "
                    "WHERE eID=:eID");
      query.bindValue(":eID", eID);
      query.bindValue(":FirstName", FirstName);
      query.bindValue(":SecondName", SecondName);
      query.bindValue(":MiddleName", MiddleName);
      query.bindValue(":LastName", LastName);
      query.bindValue(":HomeAddress", HomeAddress);
      query.bindValue(":School", School);
      query.bindValue(":Course", Course);
      query.bindValue(":Balance", Balance);
      query.exec();
      qDebug()<<query.lastError();

    PopUpEditBoarderSave *popEdit=new PopUpEditBoarderSave;
    this->hide();
    popEdit->show();
}

void EditWindow2::on_pushButtonCancel_clicked()
{
    Rents *r=new Rents;
    this->hide();
    r->show();
}
