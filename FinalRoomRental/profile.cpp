#include "profile.h"
#include "ui_profile.h"
#include "rents.h"

Profile::Profile(QWidget *parent) :
    QWidget(parent),
    ui(new Ui::Profile)
{
    ui->setupUi(this);
}

Profile::~Profile()
{
    delete ui;
}

Profile::Profile(const QString &tempUser, const QString &tempPass, QSqlDatabase &db) :
    ui(new Ui::Profile)
{
    ui->setupUi(this);
    Notification *notifs=new Notification;
    Username=tempUser;
    Password=tempPass;
    qDebug()<<"Profile Entered" <<Username <<Password;

    query=new QSqlQuery(db);
    query->prepare("SELECt *FROM AddBoarder WHERE Username=:Username and Password=:Password");
    query->bindValue(":Username", Username);
    query->bindValue(":Password", Password);
    qDebug()<<query->lastError();
    if(query->exec()){
        while(query->next()){
            ui->labelDateEntered_2->setText(query->value(1).toString());
            ui->labelGender_2->setText(query->value(3).toString());
            ui->labelRoomNumber_2->setText(query->value(2).toString());
            ui->labelFirstName_2->setText(query->value(4).toString());
            ui->labelSecondName_2->setText(query->value(5).toString());
            ui->labelMiddleName_2->setText(query->value(6).toString());
            ui->labelLastName_2->setText(query->value(7).toString());
            ui->labelHomeAddress_2->setText(query->value(8).toString());
            ui->labelSchool_2->setText(query->value(9).toString());
            ui->labelCourse_2->setText(query->value(10).toString());
            ui->labelBalance_2->setText(query->value(11).toString());
        }
    }
}

void Profile::on_pushButtonLogout_clicked()
{
    AdminGuest *aG=new AdminGuest;
    this->hide();
    aG->show();
}
