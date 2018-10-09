#ifndef CREATEUSER_H
#define CREATEUSER_H

#include <QWidget>

namespace Ui {
class CreateUser;
}

class CreateUser : public QWidget
{
    Q_OBJECT

public:
    explicit CreateUser(QWidget *parent = 0);
    ~CreateUser();
    void loadDatabase();
    void delay(int seconds);

private slots:
    void on_pushButtonOK_clicked();

    void on_lineEditUsername_textChanged(const QString &arg1);

    void on_lineEditPassword_textChanged(const QString &arg1);

    void on_pushButtonCreate_clicked();

private:
    Ui::CreateUser *ui;
    int eID;
    QString storedFirstName;
    QString storedLastName;
    QString firstName;
    QString lastName;
    QString Username;
    QString Password;
    QString storedUsername;
    QString storedPassword;
};

#endif // CREATEUSER_H
